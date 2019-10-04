<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';
?>
<html>
    <head>
        <?php head(); ?>
    </head>
    <body>
        <div class="page-container">
            <div class="left-content">
                <div class="mother-grid-inner">
                    <ol class="breadcrumb">
			            <center>
                            <li class="breadcrumb-item">
                                <h4 class="clearfix">
                                    <a class="float-right text-danger">
                                        <?php echo date("l jS F Y"); ?>                                    
                                    </a>
                                    <a class="float-left text-danger">
                                        <?php  date_default_timezone_set( "Asia/Kolkata"); echo date("h:i A"); ?>
                                    </a>
                                    <a href="">Dashboard</a>                                                                        
                                </h4>                                
                            </li>
                        </center>
                    </ol>
                    <div class="four-grids">
                        <div class="col-md-3 four-grid">
                            <div class="four-agileits">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>Examiner</h3>
								    <h4> <?php echo $con->query("select * from examiner_login where status=0")->num_rows; ?>  </h4>								
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <div class="four-grids">
                        <div class="col-md-3 four-grid">
                            <div class="four-agileinfo">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>Candidate</h3>
								    <h4> <?php echo $con->query("select * from candidate_login where status=0")->num_rows; ?>  </h4>								
                                </div>
                            </div><br>
                        </div>
                    </div>                    
                    <div class="four-grids">
                        <div class="col-md-3 four-grid">
                            <div class="four-w3ls">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>EXAMINATIONS</h3>
								    <h4> <?php echo $con->query("select * from active_exams")->num_rows; ?>  </h4>								
                                </div>
                            </div><br>
                        </div>
                    </div>                    
                    <div class="four-grids">
                        <div class="col-md-3 four-grid">
                            <div class="four-wthree">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-file" aria-hidden="true"></i>
                                </div>
                                <div class="four-text">
                                    <h3>REPORT</h3>
								    <h4> <?php echo $con->query("select * from active_exams")->num_rows; ?>  </h4>								
                                </div>
                            </div><br>
                        </div>
                    </div>                    
                </div>                
            </div>
            <?php sidebar(); ?>
        </div>
        <?php script(); ?>
    </body>
</html>