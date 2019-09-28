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
                                <h4><a href="">Posted Exam List</a></h4>
                            </li>
                        </center>
		            </ol>        
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>List of Posted Exams</h2>                                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>