<?php 
ini_set('max_execution_time', 10000);
include("database.php");   
include("required.php");
 $flag=0;
if(isset($_POST['loginSubmit'])){
    $username=$_POST['email_id'];
    $password=$_POST['password'];
    $set2=mysqli_query($conn,"select * from `CANDIDATE_LOGINS` where `EMAIL`='$username' && `PASSWORD`='$password'");
    $count=mysqli_num_rows($set2);    
    if($count>0)
    {   
      $fet2=mysqli_fetch_array($set2);
      $id=$fet2['ID'];        
      $email=$fet2['EMAIL'];       
      @session_start(); 
      $_SESSION['SESS_ID']=$id;      
      $_SESSION['SESS_EMAIL']=$email;         
      $_SESSION['loggedin_time'] = time();
      session_write_close();
      ob_start();
      echo "<meta http-equiv='refresh' content='0;url=index.php'>";
      ob_flush();
      $flag=0;
    }  
    else
    {
       $flag=1;
    }   
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php head(); ?>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dist/css/font-awesome.min.css">                
  <link rel="stylesheet" href="assets/dist/css/style.css">
</head>
<body>
<h1 class="error">GET PAPER-LESS ASSESMENT ENVIORMENT</h1>	
    <div class="w3layouts-two-grids">	
        <div class="mid-class">
            <div class="img-right-side">
                <h3>Manage Your Account</h3>
                <p>Mange Your Paragraph </p>
                <img src="images/icon_image/b11.png" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side">
              <?php if($flag=='1'){ ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="icon fa fa-ban"></i>Enter Correct Email and Password.
              </div> 
              <?php } ?>
              <h2> Login </h2>
                <form id="loginForm" method="post"  class="form-horizontal">                    
                    <div class="form-left-to-w3l form-group">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="email"  name="email_id" placeholder="Email" required="">                                                
                    </div>                    
                    <div class="form-left-to-w3l form-group">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Password" required="">                        
                    </div>                    
                    <div class="form-group">
                        <small><div id="loginMessages"></div></small>                        
                    </div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">Remember me </span>
                        </div>
                        <div class="right-side-forget">
                            <a href="#" class="for">Forgot password...?</a>
                        </div>
                    </div>
                    <div class="btnn">
                    <button name="loginSubmit" type="submit">Sign In</button>
                    </div>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>Don't Have an account..?
                        <a data-toggle="modal" data-target="#signUp" style="cursor: pointer">Sign Up
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    </div>	

        <div class="modal txt-left-side" id="signUp">
            <div class="modal-content modal-dialog txt-left-side">
                <div class="modal-header">                
                    <h3 class="modal-title">Register</h3>
                </div>                                
                <form id="registerForm" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-left-to-w3l form-group">
                            <span class="fa fa-envelope-o" aria-hidden="true"></span>
                            <input type="email"  name="r_email" placeholder="Email" required="">                        
                        </div>                                            
                        <div class="form-left-to-w3l form-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <input type="password" name="r_password" placeholder="Password" required="">
                        </div>
                        <div class="form-left-to-w3l form-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <input type="password" name="r_cpassword" placeholder="Cofirm Password" required="">
                        </div>
                        <div class="form-group">
                            <small><div id="registerMessages"></div></small>                                                    
                        </div>
                        <div class="btnn">
                            <button type="submit" id="sendOTP">Submit</button>                        
                        </div>
                    </div>                                        
                </form>
                <form style="display:none" id="otpCheck" method="post" class="form-horizontal" action="verify_mail.php/">
                    <div class="modal-body form-group">                                            
                        <div class="form-left-to-w3l form-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <input type="password" name="otp" placeholder="Enter OTP" required="">
                        </div>                        
                        <div class="modal-footer">
                            <button name="loginSubmit" type="submit" id="verifyOTP">Submit</button>
                        </div>
                    </div>                                                                
                </form>
                <div id="loading_page" style="display: none">
                    <div class="col-md-1 col-md-offset-4">
                        <div class="loader" id="loader-4">
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
              
        <?php script(); ?>
        <footer class="copyrigh-wthree">
          <p>
              Batch © 2016-20  Major Project. All Rights Reserved | Design by
              <a href="#" target="_blank">.....</a>
          </p>
      </footer>
</body>
</html>
