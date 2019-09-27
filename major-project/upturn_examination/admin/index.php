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
<div class="left-content">
<div class="mother-grid-inner">

<?php 
session_start();
if($_SESSION["userid"]==true)

{
include("connect.php");
include("fetch_records.php")
?>
<?php include("header.php"); ?>


		<ol class="breadcrumb">
			<center><li class="breadcrumb-item"><h4><a href="">Admin Dashboard</a></h4></li></center>
		</ol>

		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Examiner</h3>
								<h4> <?php echo number_format($departments); ?>  </h4>								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Candidate</h3>
								<h4><?php echo number_format($students); ?></h4>
							</div>							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>EXAMINATIONS</h3>
								<h4><?php echo number_format($examination); ?></h4>								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-file" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>REPORT</h3>
								<h4><?php echo number_format($subjects); ?></h4>								
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