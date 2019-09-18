<?php
    date_default_timezone_set('asia/kolkata');
    error_reporting(0);
    @ini_set('display_errors',0);
    ini_set('max_execution_time', 200000);     
    $host="localhost";
    $database="major_project";
    $user="root";
    $password="";    
    $con = mysql_connect($host,$user,$password) or die('Error Connecting to MySQL DataBase' .mysql_error());
    mysql_select_db($database,$con);    
    function database_setup(){
        $create_candidate_main = 
            "CREATE TABLE IF NOT EXISTS CANDIDATE_LOGINS
            (
                ID INT PRIMARY KEY AUTO_INCREMENT,
                EMAIL VARCHAR(250) NOT NULL UNIQUE,
                PASSWORD VARCHAR(250) NOT NULL,
                `is_deleted` int(1) NOT NULL DEFAULT '0',
            )";  
        mysql_query($query);
    }
?>