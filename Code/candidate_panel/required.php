<?php
@session_start();
    function script(){
?>    
    <script>        

        $(function() {                        
            $('#otpCheck').submit(function(event) {
                event.preventDefault();
                var formEl = $(this);              
                loading_page.style.display='block';
                $.ajax({
                    type: "POST",
                    url: "verify_mail.php/",
                    accept: {
                        javascript: 'application/javascript'
                    },
                    data: formEl.serialize(),                    
                    success: function(result){     
                        loading_page.style.display='none';
                        alert("If not redirect try to login...!");
                        if(result==1){
                            xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function(){
                                if(this.readyState == 4 && this.status==200){                                                            
                                    if(this.responseText==1){          
                                        alert("Succesfully register...!");
                                        window.location.href="index.php"
                                    }
                                    else{
                                        alert("Email Id Already Exist...!");
                                        history.replaceState("", "", "");
                                    }
                                }
                            };       
                            xmlhttp.open('GET','verify_mail.php?saveDB=1',true);
                            xmlhttp.send();        
                        }
                        else{                            
                            alert("Invalid OTP....!");
                        }
                    }
                });                            
            });
        });

        
        window.onload = function() {
            history.replaceState("", "", "");
        }        

        $(document).ready(function() {            
            
            $('#loginForm').bootstrapValidator({                                                
                container: '#loginMessages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {                    
                    email_id: {                        
                        validators: {
                            notEmpty: {
                                message: 'The email address cannot be empty'
                            },
                            emailAddress: {
                                message: 'The email address is not a valid'
                            }
                        }
                    },
                    password: {                                            
                        validators: {
                            notEmpty: {
                                message: 'The password is  and cannot be empty'
                            },                            
                            different: {
                                field: 'email_id',
                                message: 'The password cannot be the same as email'
                            },
                            stringLength: {
                                min: 8,
                                message: 'The password must have at least 8 characters'
                            }
                        }
                    }
                }
            });


            $('#registerForm').bootstrapValidator({
                container: '#registerMessages',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {                    
                    r_email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is  and cannot be empty'
                            },
                            emailAddress: {
                                message: 'The email address is not a valid'
                            }
                        }
                    },
                    r_password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is  and cannot be empty'
                            },
                            different: {
                                field: 'r_email',
                                message: 'The password cannot be the same as email'
                            },                                                                                    
                            stringLength: {
                                min: 8,
                                message: 'The password must have at least 8 characters'
                            }                            
                        }
                    },
                    r_cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password is  and cannot be empty'
                            },                            
                            identical: {
                                field: 'r_password',                                
                                message: 'confirm password must be same as password'
                            },
                            stringLength: {
                                min: 8,
                                message: 'The password must have at least 8 characters'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {            
                e.preventDefault();
                var formEl = $(this);                
                loading_page.style.display='block';
                $.ajax({
                    type: "POST",
                    url: "verify_mail.php/",
                    accept: {
                        javascript: 'application/javascript'
                    },
                    data: formEl.serialize(),                                            
                    success: function(result){                                                                                                
                        loading_page.style.display='none';                        
                        $('#registerForm').bootstrapValidator('resetForm', true);
                        alert(result);
                        if(result.includes("Succesfully")){                                                            
                            otpCheck.style.display='block';
                            registerForm.style.display='none';
                        }                        
                    }
                });            	        	        
	        });            

        });        
    </script>    
<?php
    }
    function head(){
        ?>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">    
                <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.2.0/css/bootstrap.min.css"/>                
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>                
                <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
                <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
                <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1.11.1/jquery.min.js"></script>
                <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
        <?php
            }
        ?>