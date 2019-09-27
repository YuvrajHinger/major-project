<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';    
    $flag=0;
    if(isset($_POST['question_submit'])){				
        $exam_id=$_POST['exam_title'];
        $question=$_POST['question'];
        $answer=$_POST['answer'];       
        $query="INSERT INTO answer(answer_text,exam_id) VALUES ('$answer','$exam_id')";
        if($con->query($query)==TRUE){
            $answer_id=$con->insert_id;
            $query="INSERT INTO question(question_text,answer_id,exam_id) VALUES ('$question','$answer_id','$exam_id')";        
            $con->query($query);		
            $option=$_POST['option'];
            foreach($option as $key=>$value){            
                $query="INSERT INTO answer(answer_text,exam_id) VALUES ('$value','$exam_id')";
                $con->query($query);		
            }             
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
                                <h4><a href="">Add Question</a></h4>
                            </li>
                        </center>
		            </ol>
                    <div class="validation-system"> 		                        
 		                <div class="validation-form">
                            <?php if($flag==1){ ?>
                                <div class="alert alert-success alert-dismissible">                  			
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-angle-right"></i> SuccessFullyRegisterd Question.
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
                                    <label class="control-label"> Exam Title</label>
                                    <select class="form-control" name="exam_title" required>                                    
                                        <option value="">Select any exam</option>  <?php $result = $con->query("SELECT * FROM exam where status='0'"); while($row=$result->fetch_assoc()) {?>
                                        <option value="<?php echo $row['exam_id'] ?>"><?php echo $row['exam_title']; ?></option>  <?php } ?>
                                    </select>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                        
                                    <label class="control-label"> Question ?</label>
                                    <textarea class="form-control" rows="2"  name="question" required></textarea>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                        
                                    <label class="control-label"> Answer</label>
                                    <textarea class="form-control" rows="3" name="answer" required></textarea>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group1 group-mail">                                                                                            
                                    <table class="table table-bordered table-hover" id="option_ans">
                                        <tr id="option_content">
                                            <td>
                                                <label class="control-label">Option</label>                                
                                                <textarea class="form-control" rows="3" name="option[]" required></textarea>                                                
                                            </td>
                                        </tr>
                                    </table>
                                </div>                                                                
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group">
                                    <button type="button" class="btn btn-danger" onclick="add_option('option_ans','option_content')">Add Option</button>
                                    <button type="submit" class="btn btn-primary" name="question_submit">Submit</button>
                                    <button type="reset" class="btn btn-default" value="reset">Reset</button>
                                </div>		
                                <div class="clearfix"> </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
            <script>
            function add_option(tableId,cellId){        
                var table = document.getElementById(tableId);        
                var row = table.insertRow();        
                cellId = document.getElementById(cellId);
                row.innerHTML = cellId.innerHTML;
                var cell = row.insertCell();
                cell.innerHTML = '<a class="btn btn-danger" onclick="delete_option(\''+tableId+'\',this)">Delete Option</a>';
            }
            function delete_option(tableId,i){          
                i = i.parentNode.parentNode.rowIndex;      
                var table = document.getElementById(tableId);
                table.deleteRow(i);
            }          
            </script>
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>