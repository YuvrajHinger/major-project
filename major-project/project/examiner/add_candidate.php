<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';    
    $flag=0;
    if(isset($_POST['candidate_submit'])){				
        $candidate_username=$_POST['candidate_username'];
        $result = $con->query("select candidate_id from candidate_login where candidate_username='$candidate_username'");
	    $count=$result->num_rows;
	    if($count==0){             
            $candidate_password=$_POST['candidate_password'];            
            $query="INSERT INTO candidate_login(candidate_username,candidate_password) VALUES ('$candidate_username','$candidate_password')";        
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
                                <h4 class="clearfix">
                                    <a href="add_candidate_ByExcel.php" class="float-right btn btn-warning">
                                        <i class="fa fa-file-excel-o"> Excel</i>                                        
                                    </a>                                    
                                    <a>Add Candidate</a>                                                                        
                                </h4>                                
                            </li>
                        </center>
		            </ol>
                    <div class="validation-system"> 		                        
 		                <div class="validation-form">
                            <?php if($flag==1){ ?>
                                <div class="alert alert-success alert-dismissible">                  			
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-angle-right"></i> SuccessFullyRegisterd Candidate.
                                </div> 
                            <?php  }
                            else if($flag==-1){ ?>
                                <div class="alert alert-danger alert-dismissible">                  			
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  			        <i class="icon fa fa-ban"></i> Problem Inserting Data.
              			        </div> 
                            <?php  } ?>
                            <form action="" method="post">
                                <div class="col-md-12 form-group1 group-mail">
                                    <label class="control-label"> Candidate Username</label>
                                    <input type="text" name="candidate_username" class="form-control" placeholder="Username..." required>
                                </div>
                                <div class="clearfix"> </div>                                                                
                                <div class="col-md-12 form-group1 group-mail">
                                    <label class="control-label"> Candidate Password</label>
                                    <input type="password" name="candidate_password" class="form-control" placeholder="Password..." required>
                                </div>
                                <div class="clearfix"> </div>                                                                
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-primary" name="candidate_submit" >Submit</button>
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


<!-- CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_text` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `answer` (`answer_id`, `answer_text`, `question_id`, `exam_id`, `status`) VALUES
(1, 'Hyper Text Markup Language', 1, 1, 0),
(2, 'High Text Markup Language', 1, 1, 0),
(3, 'Hyper Text Make Language', 1, 1, 0),
(4, 'High-Level Textual Markup Language', 1, 1, 0),
(5, 'Javascript', 2, 1, 0),
(6, 'JavaStyle', 2, 1, 0),
(7, 'JavaSide', 2, 1, 0),
(8, 'cascading style sheet', 3, 1, 0),
(9, 'cascade style show', 3, 1, 0),
(10, 'casecade style sheet', 3, 1, 0),
(11, 'cascading style show', 3, 1, 0);
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12; -->
