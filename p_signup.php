<?php
$conn = mysqli_connect("localhost","root","","");
if(isset($_POST['submit']))
{
    $pname = $_POST['pname'];
    $page = $_POST['page'];
    $pid = $_POST['pid'];
    $pemail = $_POST['pemial'];
    $pnum = $_POST['pnum'];
    $ppassword = $_POST['ppassword'];
    $pblood = $_POST['pblood'];

    $query = "INSERT INTO Patient(name,phone) values('$name','$phone')";
    $run = mysqli_query($conn,$query);

    //HEllo
}