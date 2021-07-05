<?php
 //Constants for database connection
 define('DB_HOST','localhost');
 define('DB_USER','root');
 define('DB_PASS','');
 define('DB_NAME','payrollv1');

 //connecting to database 
 $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Unable to connect');
 //if there is some error connecting to the database
 //with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>