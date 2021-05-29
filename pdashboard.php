<?php
session_start();
$tablename = $_SESSION['tablename'];

//Establishing Connection with Db
$conn = mysqli_connect("localhost","root","","data_stethoscope");
if(!$conn)
{
    echo "success";
}

//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);

$query = "SELECT * FROM $tablename";
$run = mysqli_query($conn, $query);
if(!$run)
{
    echo mysqli_error($conn);

}
    while($row = mysqli_fetch_assoc($run)) 
    {
        echo "sno : {$row['sno']}<br>".
            " DATE :{$row['date']}  <br> ".
            "filename : {$row['filename']} <br> ".
           "dname :{$row['dname']}<br>". 
           "dnum : {$row['dnum']}<br>";
     
    } 


?>