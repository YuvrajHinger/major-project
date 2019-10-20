<?php
    session_start();
    if(empty($_SESSION['examiner_id'])) header("Location: login.php");
    require_once 'database.php';
    require_once 'layout.php';        
    if(isset($_POST['detail_view'])){
        $_SESSION['detail_applicant_id']=$_POST['candidate_id'];
        $_SESSION['detail_exam_id']=$_POST['exam_id'];
        $_SESSION['score']=$_POST['score'];
        header("Location: report_detail.php");
    }
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
                    
                    <div class="bg-light table-responsive">                
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Candidate Name</th>
                                <th>Exam</th>
                                <th>Date</th>
                                <th>Total Question</th>
                                <th>Correct</th>
                                <th>Wrong</th>
                                <th>Score</th>
                                <th>Negative Marking</th>
                                <th>Action</th>
                            </tr>                                                        
                        </thead>
                        <tbody>
                        <?php 
                        $query="select * from active_exams where status=0 and examiner_id='".$_SESSION['examiner_id']."'";
                        $result=$con->query($query);
                        $index=0;
                        while($fetchData=$result->fetch_assoc()){                                                        
                            $exam=$fetchData['title'];
                            $date=$fetchData['date'];
                            $total_question=$fetchData['total_question'];                            
                            $negative_marking=$fetchData['negative_marking'];
                            $result1=$con->query("select * from report where exam_id='".$fetchData['id']."'");
                            while($fetchData1=$result1->fetch_assoc()){
                                $index++;
                                $applicant_id=$con->query("select candidate_username from candidate_login where candidate_id='".$fetchData1['applicant_id']."'")->fetch_assoc();
                                $applicant_id=$applicant_id['candidate_username'];
                                $report=$fetchData1['report'];                                
                                $report=json_decode($report);
                                $correct=0; $wrong=0; $score=0; $count=count($report);
                                for($i=0;$i<$count;$i++){
                                    $qid=$report[$i]->qid;
                                    $aid=$report[$i]->aid;
                                    $data=$con->query("select answer_id from question where question_id='$qid' and status='0'")->fetch_assoc();
                                    $data=$data['answer_id'];
                                    if($aid==$data) $correct++;
                                    else $wrong++;
                                }
                                $score=$correct;
                                if($negative_marking=="yes"){
                                    $score=$score-($wrong/2);
                                }                            
                        ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo $applicant_id; ?></td>
                                <td><?php echo $exam; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $total_question; ?></td>
                                <td><?php echo $correct; ?></td>
                                <td><?php echo $wrong; ?></td>
                                <td><?php echo $score; ?></td>
                                <td><?php echo $negative_marking; ?></td>
                                <td>
                                    <form method="post">
                                    <input type="hidden" name="candidate_id" value="<?php echo $fetchData1['applicant_id']; ?>"/>
                                    <input type="hidden" name="exam_id" value="<?php echo $fetchData['id']; ?>"/>
                                    <input type="hidden" name="score" value="<?php echo $score; ?>"/>
                                    <button class="btn btn-primary" name="detail_view" type="submit">Detail View</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }}?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <?php sidebar(); ?>
        </div>
        <?php script(); ?>
        <style>
            .myform{
                margin: 0px 0px 10px 0px;
                padding: 30px;                                    
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            }            
        </style>
    </body>
</html>