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
                                <h4><a>Quiz</a></h4>
                            </li>
                        </center>
                    </ol>      
                    <div class="col-sm-6 col-sm-offset-3 container">                        
                            <div data-spy="affix" data-offset-top="50">
                                <div class="panel panel-default bg-warning text-center">
                                    <div class="panel-heading">Time Remaining</div>
                                    <h4 id="timer"></h4>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">         
                                <style>
                                    .affix {
                                        top:10px;
                                        position: fixed;   	                               
	                                    z-index:777;
                                    }
                                    .btn-option {                                                                    
                                        font-family: monospace;                                            
                                        margin: 5px;                            
                                        color: black;
                                        font-family: monospace;
                                        background-color: whitesmoke;
                                        border-color: #285e8e; 
                                    }
                                    .btn-option:hover{
                                        color: white;
                                        font-family: monospace;
                                        background-color: seagreen;
                                        border-color: #285e8e; 
                                    }
                                    .btn-option:focus, .btn-option:active, .btn-option.active, .open>.dropdown-toggle.btn-option {                                    
                                        color: white;
                                        font-family: monospace;
                                        background-color: darkslategrey;
                                        border-color: #285e8e; 
                                    }
                                </style>                                       
                                <div class="panel-group">                                    <?php $query="select * from question order by rand()"; $result=$con->query($query); $i=0; while($fetchdata=$result->fetch_assoc()){ $q_id=$fetchdata['question_id']; $q_text=$fetchdata['question_text']; $i++; ?>                                
                                    <div class="panel panel-default">                                    
                                        <div class="panel-heading"><h2 style="color: inherit"><?php echo $i.". ".$q_text; ?></h2></div>
                                        <div class="panel-body">
                                            <div data-toggle="buttons"> <?php $query="select * from answer where question_id='$q_id' order by rand()"; $result1=$con->query($query); while($fetchdata1=$result1->fetch_assoc()){ $a_id=$fetchdata1['answer_id']; $option=$fetchdata1['answer_text']; ?>                                            
                                                <label class="btn btn-option" style="border-radius: 20px; white-space:normal !important; word-wrap: break-word;">
                                                    <input type="radio" name="<?php echo $q_id; ?>" value="<?php echo $a_id; ?>"/>
                                                    <h5><?php echo $option; ?></h5>
                                                </label>                           <?php } ?>
                                            </div>                                       
                                        </div> 
                                        <div class="panel-footer"></div>
                                    </div>                                                                  <?php } ?>                                
                                </div>  
                            </div>
                        </div>
                    </div>
                                
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
            <script>
                var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();                
                var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("timer").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("timer").innerHTML = "EXPIRED";
                    }}, 1000);
                    $(document).ready(function(){ 
	                    $(window).bind('resize', function(e){
		                    $(".affix").css('width',$(".container" ).width());
	                    });
	                    $(window).on("scroll", function() {
		                    $(".affix").css('width',$(".container" ).width());
	                    });
                    });
            </script>
        </div>        
    </body>
</html>