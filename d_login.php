<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "failed";

}

$dnumber = $_POST['dnum'];
$dpwd = $_POST['dpwd'];
$pnum =$_POST['pnum'];

$query = "SELECT * FROM doctor WHERE dnumber = $dnumber";
$run = mysqli_query($conn,$query);
if(!$run)
{
    echo mysqli_error($conn);
}
$row = mysqli_fetch_assoc($run);
$password = $row['dpwd'];

if($dpwd!=$password)
{
    echo "incorrect password";
}
else
{
    echo "hello";
}


?>