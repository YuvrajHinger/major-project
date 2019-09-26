<?php        
@session_start();
include('database.php');
    if(isset($_POST['email_id'])){                
        $id=$_POST['email_id'];
        $password=$_POST['password'];                
        unset($_POST['email_id']);
        $checkExist = mysqli_query($conn,"select ID from CANDIDATE_LOGINS where EMAIL='$id' and PASSWORD='$password'");        
        $count=mysqli_num_rows($checkExist);        
        if($count>0){ 
            $_SESSION['id']=$id;
            $_SESSION['password']=$password;        
            header("Location: ../index.php");            
        }   
        else{
            $_SESSION['errorMessage']=true;            
            unset($_SESSION['id']);
            unset($_SESSION['password']);
            header("Location: ../login.php");            
        }
    }
    else if(isset($_POST['r_email'])){     
        $id=$_POST['r_email'];           
        $password=$_POST['r_password'];    
        unset($_POST['r_email']);
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
                $rand=1;
                echo $rand;
            }        
            else{
                $rand=0;
                echo $rand;
            }        
        }
        else{
            $rand=0;
            echo $rand;
        }
    }        
    else if(isset($_POST['otp'])){
        $otp=$_POST['otp'];
        unset($_POST['otp']);
        $rand=0;
        if($_SESSION['OTP']==$otp){
            $rand=1; 
            $_SESSION['id']=$_SESSION['tid'];
            echo $rand;
        }        
        else{
            $rand=0;
            echo $rand;
        }
    }
    else if(isset($_GET['resend'])){
        unset($_GET['resend']);
        $rand=rand(100000,999999);            
        $subject="RESEND OTP FOR EMAIL VERIFICATION";    
        $message="Your One Time Password(OTP) for registration is ".$rand;    
        if(mail($_SESSION['id'],$subject,$message)){                                        
            $_SESSION['OTP']=$rand;
            $rand=1;
            echo $rand;
        }        
        else{
            $rand=0;
            echo $rand;
        }        
    }
    else if(isset($_GET['saveDB'])){
        unset($_GET['saveDB']);
        $flag=0;
        $id=$_SESSION['id'];
        $password=$_SESSION['password'];
        $query="insert into CANDIDATE_LOGINS(email,password) values('$id','$password')";
        if(mysqli_query($conn,$query)){
            $flag=1;
            echo $flag; 
        }
        else{
            echo $flag;
        }
    }
    else if(isset($_GET['isExist'])){
        unset($_GET['isExist']);
        $flag=0;
        $id=$_SESSION['id'];
        $checkExist = mysqli_query($conn,"select email from CANDIDATE_LOGINS where EMAIL='$id'");
        $count=mysqli_num_rows($checkExist);
	    if($count==0){ 
            $flag=1;
            echo $flag; 
        }
        else{
            echo $flag;
        }
    }
?>
        