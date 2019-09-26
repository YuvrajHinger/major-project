<?php 
date_default_timezone_set('asia/kolkata');
error_reporting(0);
@ini_set('display_errors',0);
ini_set('max_execution_time', 200000); 
@session_start();
$host="localhost";
// $database="id10912409_major_project";
// $user="id10912409_paperless_evaluation";
// $password="3002016123";    
    $database="major_project";
    $user="root";
    $password="";    
$conn = new mysqli($host, $user, $password, $database);
?>