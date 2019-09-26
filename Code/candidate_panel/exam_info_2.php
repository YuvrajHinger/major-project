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
                    <div class="col-md-12">            
                        <label class="control-label">Question</label>                                              
                        <input type="text" class="form-control" placeholder="Enter Question">                                                                            
                    </div>                     
                </div>

                <div class="row">
                    <div class="col-md-12">            
                        <label class="control-label">Answer</label>                                              
                        <input type="text" class="form-control" placeholder="Enter Answer">                                                                            
                    </div>                     
                </div>

                <div class="row">
                    <div class="col-md-12">            
                        <label class="control-label">Option</label>                                                          
                        <table class="table table-bordered table-hover" id="option_ans">
                            <tr id="option_content">
                                <td><input type="text" class="form-control" placeholder="Enter Option..."/></td>
                                <td><a class="btn btn-sm btn-primary" rel="tooltip" onclick="addRow('option_ans','option_content')"><i class="fa fa-plus"></i></a></td>                                
                            </tr>                       
                        </table>
                    </div>                                                
                </div>

                <div class="row">                 
                    <div class="col-md-4">
                        <a href="exam_info_2.php" type="button" class="btn btn-primary">Add More Question</a>
                        <a href="exam_info_2.php" type="button" class="btn btn-success">Save and Next</a>
                    </div>
                </div>                            

			</div>
		</div>
		
	</section>
	 
<?php footer();?>
<?php script();?>
<script>
	function addRow(tableId,cellId){        
		var table = document.getElementById(tableId);        
		var row = table.insertRow();        
		cellId = document.getElementById(cellId);
		row.innerHTML = cellId.innerHTML;
		var cell = row.insertCell();
		cell.innerHTML = '<a class="btn btn-sm btn-danger" rel="tooltip" onclick="deleteRow(\''+tableId+'\',this)"><i class="fa fa-trash"></i></a>';
	}
	function deleteRow(tableId,i){          
		i = i.parentNode.parentNode.rowIndex;      
		var table = document.getElementById(tableId);
		table.deleteRow(i);
	}          
</script>