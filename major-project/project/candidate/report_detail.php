<?php
    session_start();
    if(empty($_SESSION['candidate_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';  
    if(!isset($_SESSION['detail_exam'])) header("Location: report.php");    
    $exam_id=$_SESSION['detail_exam'];    
    $candidate_id=$_SESSION['candidate_id'];
    $applicant_id=$con->query("select candidate_username from candidate_login where candidate_id='$candidate_id'")->fetch_assoc(); $applicant_id=$applicant_id['candidate_username'];    
    $result=$con->query("select * from report where exam_id='$exam_id' and applicant_id='$candidate_id'")->fetch_assoc();
    $report=$result['report'];
    $fetchData=$con->query("select * from active_exams where status=0 and id='".$result['exam_id']."'")->fetch_assoc(); 
    $report=json_decode($report);
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
                                <h4><a>Report</a></h4>                                                                                            
                            </li>
                        </center>
		            </ol>
                    
                    <div class="bg-light breadcrumb">                                    
                        <h4>Exam Title: <?php echo $fetchData['title']; ?></h4>
                        <h4>Score: <?php echo $_SESSION['detail_score']; ?></h4>
                        <?php 
                            $count=count($report);
                            for($i=0;$i<$count;$i++){
                                $question=$report[$i]->qid;
                                $your_answer=$report[$i]->aid;
                                $answer=$con->query("select answer_id from question where question_id='$question' and status='0'")->fetch_assoc();
                                $answer=$answer['answer_id'];
                                if($your_answer==$answer) $correct=true;
                                else $correct=false;
                                $question=$con->query("select question_text from question where question_id='$question'")->fetch_assoc(); $question=$question['question_text'];
                                $answer=$con->query("select answer_text from answer where answer_id='$answer'")->fetch_assoc(); $answer=$answer['answer_text'];
                                $your_answer=$con->query("select answer_text from answer where answer_id='$your_answer'")->fetch_assoc(); $your_answer=$your_answer['answer_text'];
                        ?>
                            <div class="myform">
                                <?php if($correct){ ?>                                    
                                    <a class="btn btn-success float-right" disabled><i class="fa fa-check"></i></a>
                                <?php }else{ ?>
                                    <a class="btn btn-danger float-right" disabled><i class="fa fa-times"></i></a>
                                <?php } ?>
                                <div class="qname"><?php echo ($i+1).". ".$question; ?></div>
                                <div class="answer"><?php echo "Correct Answer: ".$answer; ?></div>
                                <div class="your_answer"><?php echo "Your Answer: ".$your_answer; ?></div><hr>                                
                            </div>  
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php sidebar(); ?>
        </div>
        <?php script(); ?>
        <style>
            .myform{
                margin: 0px 5px 30px 5px;                                    
                padding: 30px;                                    
                background: aliceblue;
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            }            
            .qname{                
                font-size: 1.5pc;                
                word-wrap: break-word;
                color: blue;
            }
            .answer{
                color: green;                
                word-wrap: break-word;
            }
            .your_answer{
                word-wrap: break-word;
                color: red;
            }
        </style>
    </body>
    <?php unset($_SESSION['detail_exam']); ?>
</html>