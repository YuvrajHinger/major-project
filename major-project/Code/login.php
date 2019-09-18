<?php require "required.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Template</title>
    <?php head(); ?>
    <link href="bootstrap/css/style.css" rel='stylesheet' type='text/css' media="all">
</head>
<body>
    <h1 class="error">GET PAPER-LESS ASSESMENT ENVIORMENT</h1>	
    <div class="w3layouts-two-grids">	
        <div class="mid-class">
            <div class="img-right-side">
                <h3>Manage Your Account</h3>
                <p>Mange Your Paragraph </p>
                <img src="images/b11.png" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side">
                    <?php 
                        if(isset($_SESSION['errorMessage'])){                     
                            unset($_SESSION['errorMessage']);       
                    ?>
                        <a style="color: red">Invalid Email or Password..!</a><hr>
                    <?php }
                    ?>      
                <h2> Login </h2>
                <form id="loginForm" method="post" action="verify_mail.php/" class="form-horizontal">                    
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
                        <button id="loginsubmit" type="submit">Sign In</button>
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
                <form id="registerForm" method="post" class="form-horizontal" action="verify_mail.php/">
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
                        <div class="btnn">
                            <button type="submit" id="sendOTP">Submit</button>                        
                        </div>
                    </div>                                        
                </form>
                <form style="display:none" id="registerForm2" method="post" class="form-horizontal" action="verify_mail.php/">
                    <div class="modal-body form-group">                                            
                        <div class="form-left-to-w3l form-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <input type="password" name="otp" placeholder="Enter OTP" required="">
                        </div>                        
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" id="verifyOTP">Submit</button>
                            <button type="button" onclick="resendOTP()" id="resend_OTP">Resend OTP</button>
                        </div>
                    </div>                                                                
                </form>
            </div>
        </div>
      
        <?php script(); ?>

    <footer class="copyrigh-wthree">
        <p>
            Batch © 2016-20  Major Project. All Rights Reserved | Design by
            <a href="#" target="_blank">CyberBlue</a>
        </p>
    </footer>
</body>

</html>