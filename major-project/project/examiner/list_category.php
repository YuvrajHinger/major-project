<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';            
    $deleteFlag=0;
    if(isset($_POST['deleteAction'])){
        $delete_id=$_POST['delete_id'];
        $con->query("update category SET `status`='1' where id='$delete_id'" );                                                                                
        $deleteFlag=1;
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
                                <h4><a>Examination Category List</a></h4>
                            </li>
                        </center>
		            </ol>        
                    <div class="validation-system"> 		                        
                        <div class="validation-form">                    
                            <h2 class="text-center">List of Category</h2>
                            <?php if($deleteFlag==1){ ?>
                                <div class="alert alert-success alert-dismissible">                  			
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-angle-right"></i> SuccessFully Deleted Category.
                                </div> 
                            <?php  }            ?>                    
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                 <?php $getData=$con->query("select * from category where status='0'"); $i=0; while($fetchData=$getData->fetch_assoc()){ $i++; $id=$fetchData['id']; $title=$fetchData['title'];  ?>
                                    <tr>
                                        <td> <?php echo $i;?></td>
                                        <td><?php echo $title;?></td> 
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
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
        </div>        
    </body>
</html>