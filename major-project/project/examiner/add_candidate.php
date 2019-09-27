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
                                <h4><a href="">Add Candidate</a></h4>
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
                                <div class="col-md-12 form-group2 group-mail">
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