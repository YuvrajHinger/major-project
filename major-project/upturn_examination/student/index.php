<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Upturn Smart Online Exam System by Mayuri <br> [Master in Computer Science]
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

</head> 
<body>

<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">

<?php 
session_start();
if($_SESSION["studentid"]==true)

{
include("connect.php");
include("fetch_records.php")
?>
<?php include("header.php"); ?>


	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Student Dashboard</a></h4></li></center>
            </ol>

			
			<!--four-grids here-->
		<div class="four-grids">					
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>ACTIVE EXAMINATIONS</h3>
								<h4><?php echo number_format($active_examinations); ?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-ok-circle" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>ATTENDED EXAMS</h3>
								<h4><?php echo number_format($attended_exams); ?></h4>								
							</div>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>PASSED EXAMS</h3>
								<h4><?php echo number_format($passed_exam); ?></h4>								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>FAILED EXAMS</h3>
								<h4><?php echo number_format($failed_exam); ?></h4>

							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

	
	
<?php include("footer.php"); ?>
</div></div>
        
	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	</div>
</body>
</html>