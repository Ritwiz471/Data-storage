<?php
$conn = mysqli_connect("localhost","root","","");
if(isset($_POST['submit']))
{
    $dname = $_POST['dname'];
    $dage = $_POST['dage'];
    $dID = $_POST['dID'];
    $demail = $_POST['demail'];
    $dnumber = $_POST['dnumber'];
    $dpwd = $_POST['dpwd'];
    $dspec = $_POST['dspec'];
     
    $query = "INSERT INTO Patient(name,phone) values('$name','$phone')";
    $run = mysqli_query($conn,$query);




}
?>