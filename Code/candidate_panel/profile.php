<?php 
	include("index_layout.php"); 
	include("database.php"); 			
?>
<?php head();?>   
 	<section class="content-header">Profile</section><br>	
	<section class="content">
		<div class="container-fluid" style="background: white">
			<div class="portlet-body form">
				
				<div class="content-header">My Profile</div>																	                				
                <div class="row">
                    <div class="col-md-3">                            
                        <img class="img-fluid" src="images/icon_image/user-profile-empty.png"/>
                    </div>
                    <div class="col-md-4">                                                                                    
                        <h4 style="font-weight: bold"><?php echo $_SESSION['SESS_EMAIL']; ?></h4>
                        <a>Designation/Post</a>
                        <h5 style="font-weight: bold">Mobile No.: <a>your nos</a></h5>
                        <h5 style="font-weight: bold">Email ID.: <a>your id</a></h5>
                        <hr>
                    </div>                    
                    <div class="col-md-4">                            
                        <h5 style="font-weight: bold">Availability: <a>Fulltime</a></h5>                            
                        <h5 style="font-weight: bold">Age: <a>your age</a></h5>
                        <h5 style="font-weight: bold">Location: <a>your address</a></h5>
                        <h5 style="font-weight: bold">Year Experience: <a>your experience</a></h5>
                        <hr>                            
                        <button type="button" onclick="alert('working soon')" class="btn btn-warning">UPDATE INFORMATION</button>
                    </div>
				</div> 	

			</div>
		</div>
		
	</section>
	 
<?php footer();?>
<?php script();?>
