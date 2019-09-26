<?php 
	include("index_layout.php"); 
	include("database.php"); 			
?>
<?php head();?>   
 	<section class="content-header">Register</section><br>	
	<section class="content">
		<div class="container-fluid" style="background: white">
			<div class="portlet-body form">
				
				<div class="content-header text-center">EXAM INFORMATION</div>																	                				
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"> Exam Title</label>
                                <input type="text" class="form-control" placeholder="Exam Title..." >
                            </div>                            
                            <div class="col-md-4">
                                <label class="control-label"> Exam Purpose</label>
                                <input type="text" list="getPurpose" class="form-control" placeholder="Purpose..." >
                                <datalist id="getPurpose">
                                    <option>Select</option>
                                </datalist>
                            </div>                            
                            <div class="col-md-4">
                                <label class="control-label"> Exam-Type  </label>
                                <select class="form-control">                                    
                                    <option selected>MCQ</option>
                                    <option>Subjective</option>
                                </select>
                            </div> 
                        </div>           
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label">Timer-Mode</label>                                
                                <select class="form-control" onchange="getTime(this)">                                    
                                    <option value="">Select Any</option>
                                    <option>Per-Question</option>
                                    <option>Overall</option>
                                </select>
                            </div>                            
                            <div class="col-md-4">
                                <label class="control-label">Exam Duration</label>                                
                                <input type="time"  class="form-control" value="00:00"/>
                            </div>                                                        
                        </div>           
                        <div class="row">                 
                            <div class="col-md-4">
                                <a href="exam_info_2.php" type="button" class="btn btn-primary">Save and Next</a>
                            </div>
                        </div>
                            
			</div>
		</div>
		
	</section>
	 
<?php footer();?>
<?php script();?>
