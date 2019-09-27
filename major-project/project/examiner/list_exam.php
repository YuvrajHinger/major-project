<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';    
    $flag=0;
    if(isset($_POST['exam_submit'])){				
        $exam_title=$_POST['exam_title'];
        $result = $con->query("select exam_id from exam where exam_title='$exam_title'");
	    $count=$result->num_rows;
	    if($count==0){ 
            $exam_purpose=$_POST['exam_purpose'];
            $exam_type=$_POST['exam_type'];
            $exam_duration=$_POST['exam_duration'];
            $timer_mode=$_POST['timer_mode'];
            $examiner_id=$_SESSION['examiner_id'];		
            $query="INSERT INTO exam(exam_title,exam_purpose,exam_type,exam_duration,timer_mode,examiner_id) VALUES ('$exam_title','$exam_purpose','$exam_type','$exam_duration','$timer_mode','$examiner_id')";        
            $con->query($query);		
            $flag=1;
        }			
        else $flag=-1;			
	}	
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
                                <h4><a href="">Add Exam</a></h4>
                            </li>
                        </center>
		            </ol>        
                    <div class="breadcrumb">                                    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                 <?php $getData=$con->query("select * from exam where status='0'"); $i=0; while($fetchData=$getData->fetch_assoc()){ $i++; $id=$fetchData['exam_id']; $exam_title=$fetchData['exam_title'];  ?>
                                <tr>
                                    <td> <?php echo $i;?></td>
                                    <td  width="50%"><?php echo $exam_title;?></td> 
                                    <td>			                                    			                                    
                                        <a class="btn btn-danger"  rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>"><i class="fa fa-trash"></i></a>
                                        <div id="delete<?php echo $id ;?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-md" >
                                                <form method ="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style=" background-color: #3E3A86;color:#fff;">
                                                            <button type="button" class="close" style="color:#fff !important;opacity:1" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" >
                                                                Stay Attention
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="modal-title">
                                                                Are you sure you want to remove this record?
                                                            </h4>
                                                        </div>
                                                        <input type="hidden" value="<?php echo $id; ?>" name="delete_id">
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-sm btn-primary" name="deleteAction">Yes</button>
                                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>									
                                    <?php } ?>
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>