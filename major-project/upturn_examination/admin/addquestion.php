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
if($_SESSION["userid"]==true)
{
include("connect.php");
include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Add Question</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form action="addquestion.php" method="post">
		     <div class="col-md-12 form-group2 group-mail">
            <?php $sql = "SELECT * FROM examtbl where status='1'";
                $result = mysql_query($sql); ?>
            <label class="control-label">Select Examname</label>
            <select name="examnm" id="">
                <option value="" <?php if(!isset($_POST['examname']) || (isset($_POST['examname']) && empty($_POST['examname']))) { ?>selected<?php } ?>>--Select--</option>
                <?php 
                while($row =mysql_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['examid']; ?>" <?php if(isset($_POST['examname']) && $_POST['examname'] == $row['examname']) { ?>selected<?php } ?>><?php echo $row['examname']; ?></option>
                <?php } ?>
				
				
            </select>
			</div>
			
             <div class="clearfix"> </div>
		  <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Question ?</label>
              <textarea class="form-control" rows="3"  name="q_name" ></textarea>
          </div>
		  <div class="clearfix"> </div>
            
          <div class="col-md-12 form-group2 group-mail">
              <label class="control-label">Option 1</label>
              <textarea class="form-control" rows="3" name="opt_1" ></textarea>
          </div>
		  <div class="clearfix"> </div>
            
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 2</label>
               <textarea class="form-control" rows="3" name="opt_2" ></textarea>
          </div>
		  <div class="clearfix"> </div>
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 3</label>
               <textarea class="form-control" rows="3"  name="opt_3" ></textarea>
          </div>
		  <div class="clearfix"> </div>
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Option 4</label>
               <textarea class="form-control" rows="3" name="opt_4" ></textarea>
          </div> 
          <div class="clearfix"> </div>		  
          <div class="col-md-12 form-group2 group-mail">
               <label class="control-label">Correct Option Name</label>
               <input type="text" class="form-control"  name="correct_op" "required">
          </div>
		  <div class="clearfix"> </div>
          </div> 
			 
		  
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" name="submit" ><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);">Submit</a></button>
              <button type="reset" class="btn btn-default" value="reset" ><a href = "http://www.upturnit.com/product.php" onclick = "getConfirm(this.href);">Reset</a></button>
            </div>
		
          <div class="clearfix"> </div>
		  
		  
        </form>
    
 	<!---->
 </div>

</div>
 	<!--//grid-->
	
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	</div>
</body>
<!--popup script start -->
<script type = "text/javascript">

function getConfirm(l)
{
  if(arguments[0] != null)
  {
    if(window.confirm('Get Full Source Code at reasonable cost  ' + l + '?\n'))
    {
      location.href = l;
    }
    
    else
    {
      event.cancelBubble = true;
      event.returnValue = false;
      return false;
    }
  }
  
  else
  {
    return false;
  }
  return;
}
</script>

	<!--popup script end -->
</html>