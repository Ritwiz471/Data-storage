<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "failed";

}

$dnumber = $_POST['phno'];
$dpwd = $_POST['dpwd'];
$query = "SELECT * FROM doctor WHERE dnumber = $dnumber ";
$run = mysqli_query($conn,$query);
if(!$run)
{
    echo mysqli_error($conn);
}
$row = mysqli_fetch_assoc($run);
$password = $row['dnumber'];

if($dnum!=$password)
{
    echo "incorrect password";
}


?>