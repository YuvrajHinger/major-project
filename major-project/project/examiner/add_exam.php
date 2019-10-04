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
                                <h4><a href="">Add Examination Category</a></h4>
                            </li>
                        </center>
		            </ol>
                    <div class="validation-system"> 		                        
 		                <div class="validation-form">
                            <?php if($flag==1){ ?>
                                <div class="alert alert-success alert-dismissible">                  			
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-angle-right"></i> SuccessFully Registerd Exam.
                                </div> 
                            <?php  }
                            else if($flag==-1){ ?>
                                <div class="alert alert-danger alert-dismissible">                  			
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  			        <i class="icon fa fa-ban"></i> Problem Inserting Data.
              			        </div> 
                            <?php  } ?>
                            <form action="" method="post">
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label"> Title</label>
                                    <input type="text" name="exam_title" class="form-control" placeholder="Exam Title..." required>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                        
                                    <label class="control-label"> Exam Purpose</label>
                                    <input type="text" name="exam_purpose" list="getPurpose" class="form-control" placeholder="Purpose..." required>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                        
                                    <label class="control-label"> Exam-Type  </label>
                                    <select class="form-control" name="exam_type" required>                                    
                                        <option selected>MCQ</option>
                                        <option>Subjective</option>
                                    </select>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                        
                                    <label class="control-label">Timer-Mode</label>                                
                                    <select class="form-control" name="timer_mode" required>                                    
                                        <option value="">Select Any</option>
                                        <option>Per-Question</option>
                                        <option>Overall</option>
                                    </select>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                        
                                    <label class="control-label">Exam Duration</label>                                
                                    <input type="time"  class="form-control" name="exam_duration" required/>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-primary" name="exam_submit" >Submit</button>
                                    <button type="reset" class="btn btn-default" value="reset">Reset</button>
                                </div>		
                                <div class="clearfix"> </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>