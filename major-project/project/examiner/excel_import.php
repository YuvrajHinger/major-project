<?php  
  include 'excel_reader.php';
  $excel = new PhpExcelReader;
  $excel->read('import.xls');  
  $n=count($excel->sheets);    
  for($i=0;$i<$n;$i++)
    showData($excel->sheets[$i]);
  function showData($sheets){                
    $exam_id=3;
    $q_id=0;
    $a_id=0;
    $row=2; 
    require_once 'database.php';
      while($row<=$sheets['numRows']){
        $col=1;
        while($col<=$sheets['numCols']){
            if(isset($sheets['cells'][$row][$col])){
                $data=$sheets['cells'][$row][$col];
                if($col==1){
                    $query="INSERT INTO question(question_text,answer_id,exam_id) VALUES('$data','$a_id','$exam_id')";
                    $con->query($query);
                    $q_id=$con->insert_id;
                }                                
                else if($col==2){
                    $query="INSERT INTO answer(answer_text,question_id,exam_id) VALUES('$data','$q_id','$exam_id')";
                    $con->query($query);
                    $a_id=$con->insert_id;
                    $query="UPDATE question SET answer_id='$a_id' WHERE question_id=$q_id";        
                    $con->query($query);
                }
                else{
                    $query="INSERT INTO answer(answer_text,question_id,exam_id) VALUES('$data','$q_id','$exam_id')";
                    $con->query($query);
                }
            }                
            $col++;
        }         
        $row++;
      }        
  }
?>