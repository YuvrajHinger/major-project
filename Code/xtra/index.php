<?php
    require('required.php'); 
    if(!isset($_SESSION['id'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <?php head(); ?>
    </head>
    <body>
        <div class="panel panel-success">
            <div class="panel-heading">                
                <h3 class="text-center">
                    <?php echo " Welcome ".$_SESSION['id']; ?>
                </h3>                
                <a href="logout.php/" class="btn btn-secondary">
                    <i class="fa fa-sign-out"></i>
                </a>
            </div>
            <div class="panel-body">
                Updated Soon..!
            </div>
            <div class="panel-footer">                
            </div>
        </div>    
    </body>
</html>