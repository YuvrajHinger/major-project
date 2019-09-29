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
                                <h4><a href="">Candidate List</a></h4>
                            </li>
                        </center>
		            </ol>
                    <?php
                        if(isset($_POST['search'])){        
                            $candidate_username= $_POST['by_candidate'];                  
                            $query = "select * from `candidate_login` where `status` = '0' and (candidate_username='$candidate_username')";                
                        }
                        else{
                            $query = "select * from `candidate_login` where `status` = '0'";
                        }
                        if(isset($_POST['deleteAction']))
                        {
                            $delete_id=$_POST['delete_id'];
                            mysql_query("update `candidate_username` SET `status`='1' where id='$delete_id'" );    
                            $_SESSION['type']="success";
                            $_SESSION['message']="candidate successfully Deleted";
                            echo "<script>window.location.href='';</script>";
                        } 
                    ?>
                <div class="row">
                    <form action="" method="post">
                        <div class="col-md-3">
                            <select name="by_candidate" class="form-control select2">
                                <option value="">Search By Name</option>
                                <?php
                                    $getData=$con->query($query);		                
                                    while($fetchData=$getData->fetch_assoc()){
                                        $candidate_username= $fetchData['candidate_username'];                      
                                        echo "<option>".$candidate_username."</option>";
                                    }                 
			                    ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="search" class="btn btn-primary">FILTER</button>
                            <button type="submit" name="reset" class="btn btn-default">Reset</button>
                        </div>
                    </form>        
                </div>
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">
                                <h2>List of Candidate</h2>
                                <table  id="table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="background-color:#1b93e1;color:white;">#</th>
                                            <th style="background-color:#1b93e1;color:white;">Username</th> 
                                            <th style="background-color:#1b93e1;color:white;">Password</th> 
                                            <th style="background-color:#1b93e1;color:white;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                 <?php $getData=$con->query($query); $i=0; while($fetchData=$getData->fetch_assoc()){ $i++; $id=$fetchData['candidate_id']; $username=$fetchData['candidate_username']; $password=$fetchData['candidate_password']; ?>
                                        <tr>
                                            <td> <?php echo $i;?></td>
                                            <td><?php echo $username;?></td> 
                                            <td><?php echo $password;?></td> 
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