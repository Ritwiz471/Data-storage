<?php

$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "failed";

}

$pnum = $_POST['pnum'];
$ppassword = $_POST['ppassword'];
$tablename = "P_".$pnum;

$query = "SELECT * FROM patient WHERE pnum = $pnum ";
$run = mysqli_query($conn,$query);
if(!$run)
{
    echo mysqli_error($conn);
}
$row = mysqli_fetch_assoc($run);
$password = $row['ppassword'];

if($ppassword!=$password)
{
    echo "incorrect password";
}

?>