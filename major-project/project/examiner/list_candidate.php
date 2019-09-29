<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';            
    $deleteFlag=0;
    if(isset($_POST['deleteAction'])){
        $delete_id=$_POST['delete_id'];
        $con->query("update candidate_login SET `status`='1' where candidate_id='$delete_id'" );                                                                                
        $deleteFlag=1;
    } 
    if(isset($_POST['search'])){ 
        $candidate_username= $_POST['by_candidate']; 
        $query = "select * from `candidate_login` where status = '0' and candidate_username='$candidate_username'"; 
    } 
    else $query = "select * from `candidate_login` where status = '0'";
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
                                <h4><a>Candidate List</a></h4>
                            </li>
                        </center>
		            </ol> 
                <div class="validation-system"> 		                        
                    <div class="validation-form">                    
                        <h2 class="text-center">List of Candidate</h2>                        
                            <form action="" method="post">                                
                                <div class="row">
                                    <div class="col-md-5" style="margin: 10px">
                                        <select name="by_candidate" class="form-control select2" required>
                                            <option value="">Search By Name</option> <?php $getData=$con->query("select * from candidate_login where status='0'"); while($fetchData=$getData->fetch_assoc()){ $candidate_username= $fetchData['candidate_username']; echo "<option>".$candidate_username."</option>"; }  ?>
                                        </select>                                                                
                                    </div>                
                                    <div class="col-md-5" style="margin: 10px">                
                                        <button type="submit" name="search" class="btn btn-primary">FILTER</button>
                                        <button type="submit" name="reset" class="btn btn-default">Reset</button>                                
                                    </div>    
                                </div>
                            </form>  
                            <?php if($deleteFlag==1){ ?>
                                <div class="alert alert-success alert-dismissible">                  			
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-angle-right"></i> SuccessFully Deleted Candidate.
                                </div> 
                            <?php  }            ?>                    
                        <table  id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th> 
                                    <th>Password</th> 
                                    <th>Action</th>
                                </tr>                                    
                            </thead>
                            <tbody>                 <?php $getData=$con->query($query); $i=0; while($fetchData=$getData->fetch_assoc()){ $i++; $id=$fetchData['candidate_id']; $username=$fetchData['candidate_username']; $password=$fetchData['candidate_password']; ?>
                                <tr>
                                    <td> <?php echo $i;?></td>
                                    <td><?php echo $username;?></td> 
                                    <td><?php echo $password;?></td> 
                                    <td>			                                    			                                    
                                        <a class="btn btn-primary" onclick="alert('working soon')">Edit</a>
                                        <a class="btn btn-danger" rel="tooltip" title="Delete"  data-toggle="modal" href="#delete<?php echo $id ;?>">Delete</a>                                                                                        
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