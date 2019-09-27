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
                                <h4><a href="">Exam List</a></h4>
                            </li>
                        </center>
		            </ol>        
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>List of Exams</h2>
                                <table width="100%" id="table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Title</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                 <?php $getData=$con->query("select * from exam where status='0'"); $i=0; while($fetchData=$getData->fetch_assoc()){ $i++; $id=$fetchData['exam_id']; $exam_title=$fetchData['exam_title'];  ?>
                                        <tr>
                                            <td> <?php echo $i;?></td>
                                            <td  width="50%"><?php echo $exam_title;?></td> 
                                            <td>			                                    			                                    
                                                <a class="btn btn-primary" onclick="alert('working soon')">Edit</a>
                                                <a class="btn btn-danger" onclick="alert('working soon')">Delete</a>                                                
                                            </td>
                                        </tr>									
                                    <?php } ?>
                                    </tbody>
                                </table>                        
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