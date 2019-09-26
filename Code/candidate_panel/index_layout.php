<?php
include("database.php");
@session_start();
$id=$_SESSION['SESS_ID'];
if(empty($id))
{
	header("location:login.php");
}
function head()
{ 
	?>
	<!DOCTYPE html>
	<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Candidate</title>
		<link rel="stylesheet" href="assets/bootstrap/css/main.css">
	  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">		
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
	  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
	  <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
	  <link rel="stylesheet" href="assets/plugins/iCheck/all.css">
	  <link rel="stylesheet" href="assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
	  <link rel="stylesheet" href="assets/plugins/timepicker/bootstrap-timepicker.min.css">
	  <link rel="stylesheet" type="text/css" href="assets/select2/bootstrap-select.min.css"/>
	  <link rel="stylesheet" type="text/css" href="assets/select2/select2.css"/>
	  <link rel="stylesheet" type="text/css" href="assets/select2/multi-select.css"/>
	  <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
	  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

	  <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>                
	  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1.11.1/jquery.min.js"></script>
	  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>

	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper"> 	
	  	<header class="main-header">
				<a href="index.php" class="logo">
			  	<span class="logo-mini"><b>L</b>	GO</span>
			  	<span class="logo-lg"><b>L</b>OGO</span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar">1</span>
						<span class="icon-bar">2</span>
						<span class="icon-bar">3</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav"> 
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="images/icon_image/user-profile-empty.png" class="user-image" alt="User Image">
									<span class="hidden-xs"><?php echo $_SESSION['ID']; ?></span>
								</a> 
							</li> 
						</ul>
					</div>
				</nav>
			</header>

			<aside class="main-sidebar">
				<section class="sidebar">
		  		<div class="user-panel" align="center">
	        	<div class='imaage' >
	          	 <img src="images/icon_image/user-profile-empty.png" class="user-image" alt="User Image">
	        	</div>
	        	<div class="myname">
				  		<a href="" class=" "><?php echo $_SESSION['ID']; ?></a> 
	        	</div>
	        	<div class="myinfo">
			  			<a href="profile.php" class=" ">Edit Profile</a> 
	        	</div>
	      	</div> 
					<ul class="sidebar-menu">
						<li><a href="index.php"><img src="images/icon_image/dashboard.png" style="height: 30px;" alt="Dashboard"> <span>&nbsp; &nbsp;Dashboard </span></a></li>			
						<li class="treeview">
							<a href="#">
								<img src="images/icon_image/inventory.png" style="height: 30px;" alt="Master"> <span>&nbsp; &nbsp;ASSESMENT</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">	 
								<li><a href="generateQuiz.php"><i class="fa fa-circle-o"></i> GENERATE ASSESMENT </a></li>
							</ul>
						</li>			 
						<li><a href="candidate_view.php"><img src="images/icon_image/candidate.png" style="height: 30px;" alt="Candidate"> <span>&nbsp; &nbsp;Candidate </span></a></li>
						<li><a href="logout.php"><img src="images/icon_image/logout.png" style="height: 30px;" alt="Logout"> <span>&nbsp; &nbsp;Logout</span></a></li>			
					</ul>
				</section>
	  	</aside>
	
			<div class="content-wrapper">

	<?php
}
?>  	
<?php
function footer()
{
?>
	</div>
	  <footer class="main-footer"> 
			<strong>Batch &copy; 2016-20</strong> Major Project All Rights Reserved | Design by <a href="#" target="_blank">.....</a>
	  </footer>
	 
	</div> 
<?php 
} 
function script()
{
?>	
	<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/select2/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/select2/select2.min.js"></script>
    <script type="text/javascript" src="assets/select2/jquery.multi-select.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/iCheck/icheck.min.js"></script>
	<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="assets/plugins/jquery-validation/js/additional-methods.min.js"></script>
	<script src="assets/plugins/fastclick/fastclick.js"></script>
	<script src="assets/dist/js/app.min.js"></script>
	<script src="assets/dist/js/demo.js"></script>

	
	<script>
	  $(function () {
	  	$('.formValidation').validate();
		$(".select2").select2();		
		$('.datepicker').datepicker({
	      autoclose: true,
	      format: 'dd-mm-yyyy',
	      todayHighlight: true
	    });
		$('.timepicker').timepicker();				
	    $('.datepicker').attr('placeholder','DD-MM-YYYY');
	    $('.select2-input').addClass('form-control');
		$("#candidate_skill").select2({
			placeholder: "Select Skills",
			allowClear: true
		})
		$(".row").addClass('form-group');								
	    $("#example").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });
	  });
	</script>
	<script type="text/javascript">
		setInterval(function(){ abc(); }, 3000);
		function abc()
		{	$('#msg_div').fadeOut(500);
			var delay = 500;
			setTimeout(function() {
			$('#msg_div').remove();
			}, delay);
		}
	</script>
	<style type="text/css">							
				.user-panel img
				{
					border-radius: 100%;
					height:80px; 
					border: 1px solid #252525;
				}
			.sidebar-collapse .user-panel img
				{
				height:35px !important; 
				border-radius: 100%;
				border: 1px solid #1295A2 !important;
				width:100% !important;
			}  
			.user-panel{
				border-top: 1px solid #eee;
				margin-top: 3px;
				border-bottom: 1px solid #eee;
				padding-top: 25px;
				padding-bottom: 25px;
			}
			.myname{
				font-size: 16px;
			}
			.myinfo{
				font-size: 14px;
			}
			.required{
				color: #f92727;
			}
			.error{
				color: #f92727;
				font-weight: 400 !important;
			}
			label{
				font-weight: 400 !important;								
			}
			@media all and (min-width: 786px) {
				.sidebar-mini.sidebar-collapse .main-sidebar .user-panel > .myname, .sidebar-mini.sidebar-collapse .main-sidebar .user-panel > .myinfo {
					display: none !important;
					-webkit-transform: translateZ(0); 
				}
			}
			.select2 {
				width:100% !important;
			}
		  </style>
	</body>
	</html>
<?php
} 
?>