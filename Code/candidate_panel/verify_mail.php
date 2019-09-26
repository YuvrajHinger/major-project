<?php        
@session_start();
include('database.php');
    if(isset($_POST['r_email'])){     
        $id=$_POST['r_email'];           
        $password=$_POST['r_password'];    
        $checkExist = mysqli_query($conn,"select ID from CANDIDATE_LOGINS where EMAIL='$id'");
        $count=mysqli_num_rows($checkExist);        
	    if($count==0){                  
            $subject="EMAIL VERIFICATION";    
            $rand=rand(100000,999999);            
            $message="Your One Time Password(OTP) for registration is ".$rand;    
            if(mail($id,$subject,$message)){                            
                $_SESSION['tid']=$id;
                $_SESSION['password']=$password;        
                $_SESSION['OTP']=$rand;                
                echo "OTP Succesfully Sent";
            }        
            else{
                echo "Network Error Try again Later...!";
            }        
        }
        else{            
            echo "Email Aready Exists";
        }
    }        
    else if(isset($_POST['otp'])){
        $otp=$_POST['otp'];                
        if($_SESSION['OTP']==$otp){
            $rand=1; 
            $_SESSION['SESS_EMAIL']=$_SESSION['tid'];
            echo $rand;
        }        
        else{
            $rand=0;
            echo $rand;
        }
    }    
    else if(isset($_GET['saveDB'])){        
        $id=$_SESSION['SESS_EMAIL'];
        $password=$_SESSION['password'];
        $query="insert into CANDIDATE_LOGINS(EMAIL,PASSWORD) values('$id','$password')";
        if(mysqli_query($conn,$query)){
            $set2=mysqli_query($conn,"select * from `CANDIDATE_LOGINS` where `EMAIL`='$id' && `PASSWORD`='$password'");
            $fet2=mysqli_fetch_array($set2);
            $id=$fet2['ID'];        
            $email=$fet2['EMAIL'];       
            $_SESSION['SESS_ID']=$id;      
            $_SESSION['SESS_EMAIL']=$email;         
            $_SESSION['loggedin_time'] = time();
            $flag=1;
            echo $flag; 
        }
        else{
            $flag=0;
            echo $flag;
        }
    }    
?>
        