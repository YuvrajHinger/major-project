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
                                <h4>
                                    <a class="text-center">Quiz</a>
                                    <a class="float-right" data-spy="affix" data-offset-top="50">
                                        <div class="panel bg-info text-center"><h4 id="timer" class="panel-heading">Time Remaining: 00:00:00</h4></div>
                                    </a>
                                </h4>
                            </li>
                        </center>
                    </ol>                          
                    <div class="agile-grids">
                        <div class="agile-tables">
                            <div class="w3l-table-info">   
                                <?php $query="select * from question order by rand()"; $result=$con->query($query); $i=0; 
                                while($fetchdata=$result->fetch_assoc()){   $q_id=$fetchdata['question_id']; $q_text=$fetchdata['question_text']; $i++; ?>                                
                                    <div class="quizBox">                                    
                                        <div class="qname">
                                            <?php echo $i.". ".$q_text; ?>
                                            <hr>
                                        </div>                                        
                                        <div class="option">
                                            <div data-toggle="buttons"> 
                                                <?php $query="select * from answer where question_id='$q_id' order by rand()"; $result1=$con->query($query); 
                                                while($fetchdata1=$result1->fetch_assoc()){ $a_id=$fetchdata1['answer_id']; $option=$fetchdata1['answer_text']; ?>                                            
                                                    <label class="btn btn-option" style="border-radius: 20px; white-space:normal !important; word-wrap: break-word;">
                                                        <input type="radio" name="<?php echo $q_id; ?>" value="<?php echo $a_id; ?>"/>
                                                        <h5><?php echo $option; ?></h5>
                                                    </label>                           
                                                <?php } ?>
                                            </div>                                       
                                        </div>                                                                                                          
                                    </div> 
                                <?php } ?>                                 
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <?php script(); ?>
            <?php sidebar(); ?>
            <script>
                var hours = 0;                
                var minutes = 1;
                var second = 3;
                var x = setInterval(function() {                                        
                    second--;
                    if(hours<10 && minutes<10 && second<10) currenttime = "Time Remaining:  0"+hours+":0"+minutes+":0"+second;                     
                    else if(hours<10 && minutes<10)  currenttime = "Time Remaining:  0"+hours+":0"+minutes+":"+second; 
                    else if(hours<10 && second<10) currenttime = "Time Remaining:  0"+hours+":"+minutes+":0"+second; 
                    else if(second<10 && minutes<10) currenttime = "Time Remaining:  "+hours+":0"+minutes+":0"+second; 
                    else currenttime = "Time Remaining:  "+hours+":"+minutes+":"+second;                                   
                    if (hours<=0 && minutes<=0 && second<=0){
                        clearInterval(x);
                        document.getElementById("timer").innerHTML = "EXPIRED";
                        return;
                    }                    
                    if(second<=0 && (minutes>0 || hours>0)){
                        second=60;
                        minutes--;
                        if(minutes<=0 && hours>0){
                            minutes=60;
                            hours--;
                        }
                    }                    
                    document.getElementById("timer").innerHTML = currenttime;
                    }, 1000 );                    
            </script>
            <style>
                .affix{
                    top:10px;   
                    right: 50px;                 
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
                hr{
                    border-color: darkslategrey;
                }
                .qname{
                    padding: 20px 20px 10px 20px;                
                    font-size: 1.5pc;
                    word-wrap: break-word;
                    color: blue;
                }
                .option{
                    padding: 0px 0px 20px 20px;                                    
                }
                .quizBox{
                    margin: 0px 5px 30px 5px;                                    
                    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                }
            </style>                                       
        </div>        
    </body>
</html>