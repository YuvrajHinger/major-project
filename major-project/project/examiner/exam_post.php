<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';            
    $step=0;
    $flag=0;
    if(isset($_POST['exam_submit'])){
        $step=1;
        $category=$_POST['title'];
    }
    if(isset($_POST['question_submit'])){
        $qid=$_POST['exam_question'];        
        $question_arr='';
        foreach($qid as $key=>$value){            
            $question_arr=$question_arr.'id'.$value;
        }        
        $str=explode('id',$question_arr);                
        $alloted_date=date("Y/m/d");        
        $query="INSERT INTO exam_posting(question_id,alloted_date) VALUES('$question_arr','$alloted_date')";
        if($con->query($query)) $flag=1;        
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
                                <h4><a>POST EXAM</a></h4>
                            </li>
                        </center>
		            </ol>                    
                    <div class="validation-system"> 		                        
 		                <div class="validation-form">                            
                         <?php if($flag==1){ ?>
                                <div class="alert alert-success alert-dismissible">                  			
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-angle-right"></i> SuccessFully Post Exam.
                                </div> 
                            <?php  }
                            else if($flag==-1){ ?>
                                <div class="alert alert-danger alert-dismissible">                  			
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  			        <i class="icon fa fa-ban"></i> Problem Inserting Data.
              			        </div> 
                            <?php  } ?>
                         <?php if($step==0) {?>
                            <form action="" method="post">
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Category Title</label>
                                    <select class="form-control select2" name="title" required>                                    
                                        <option value="">Select any category</option>  <?php $result = $con->query("SELECT * FROM category where status='0'"); while($row=$result->fetch_assoc()) {?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['title']; ?></option>  <?php } ?>
                                    </select>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group">                                    
                                    <button type="submit" style="border-radius: 20px;" class="btn btn-primary" name="exam_submit">Save & Next</button>                                    
                                </div>		
                                <div class="clearfix"> </div>
                            </form>
                        <?php } 
                        else if($step==1) { ?>
                            <form action="" method="post">
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label">Select Question</label>
                                    <select class="form-control select2" name="exam_question[]" multiple required>                                    
                                        <?php $result = $con->query("SELECT * FROM question where status='0' && category='$category'"); while($row=$result->fetch_assoc()) {?>
                                        <option value="<?php echo $row['question_id'] ?>"><?php echo $row['question_text']; ?></option>  <?php } ?>
                                    </select>                                    
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group">                                                                        
                                    <button type="submit" style="border-radius: 20px;" class="btn btn-primary" name="question_submit">Save & Next</button>                                    
                                    <a class="btn btn-default" style="border-radius: 20px;" href="">Previous</a>                                    
                                </div>		
                                <div class="clearfix"> </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>                    
                </div>
            </div>            
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>