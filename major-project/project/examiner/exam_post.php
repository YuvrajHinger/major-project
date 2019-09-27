<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';            
    $step=0;
    if(isset($_POST['exam_submit'])){
        $step=1;
        $exam_id=$_POST['exam_title'];
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
                                <h4><a href="">POST EXAM</a></h4>
                            </li>
                        </center>
		            </ol>                    
                    <div class="validation-system"> 		                        
 		                <div class="validation-form">                            
                         <?php if($step==0) {?>
                            <form action="" method="post">
                                <div class="col-md-12 form-group2 group-mail">
                                    <label class="control-label"> Exam Title</label>
                                    <select class="form-control" name="exam_title" required>                                    
                                        <option value="">Select any exam</option>  <?php $result = $con->query("SELECT * FROM exam where status='0'"); while($row=$result->fetch_assoc()) {?>
                                        <option value="<?php echo $row['exam_id'] ?>"><?php echo $row['exam_title']; ?></option>  <?php } ?>
                                    </select>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group">                                    
                                    <button type="submit" class="btn btn-primary" name="exam_submit">Save & Next</button>                                    
                                </div>		
                                <div class="clearfix"> </div>
                            </form>
                        <?php } 
                        else if($step==1) { ?>
                            <form action="" method="post">
                                <div class="col-md-12 form-group2 group-mail">
                                    <table class="table table-bordered table-hover" id="option_ans">
                                        <tr id="option_content">
                                            <td>
                                                <label class="control-label">Select Question</label>
                                                <select class="form-control" name="exam_title" required>                                    
                                                    <option value="">Select any Question</option>  <?php $result = $con->query("SELECT * FROM question where status='0' && exam_id='$exam_id'"); while($row=$result->fetch_assoc()) {?>
                                                    <option value="<?php echo $row['question_id'] ?>"><?php echo $row['question_text']; ?></option>  <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-12 form-group">                                    
                                    <button type="button" class="btn btn-danger" onclick="add_option('option_ans','option_content')">Add Question</button>
                                    <button type="button" class="btn btn-primary" onclick="alert('working soon')" name="question_submit">Save & Next</button>                                    
                                    <a class="btn btn-default" href="">Previous</a>                                    
                                </div>		
                                <div class="clearfix"> </div>
                            </form>
                        <?php } ?>
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
                cell.innerHTML = '<a class="btn btn-danger" onclick="delete_option(\''+tableId+'\',this)">Delete Question</a>';
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