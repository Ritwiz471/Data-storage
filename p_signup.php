<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "<h1>failed</h1>";

}

//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);


if(isset($_POST['submit']))
{
    $pname = $_POST['pname'];
    $page = $_POST['page'];
    $pemail = $_POST['pemail'];
    $pnum = $_POST['pnum'];
    $ppassword = $_POST['ppassword'];
    $pblood = $_POST['pblood'];
    $filename = $_FILES['pid']['name'];
    $tempname = $_FILES['pid']['tmp_name'];
    $folder = "uploads/patient/".$filename;

    $query = "INSERT INTO patient(pname,page,pid,pemail,pnum,ppassword,pblood) values('$pname','$page','$filename','$pemail','$pnum','$ppassword','$pblood')";
    $run = mysqli_query($conn,$query);
    
    //check query
    if($run)
    {
        echo "<h1>success</h1>";

    }
    else
    {
        echo mysqli_error($conn);
    }
    
    //move files
    if(move_uploaded_file($tempname,$folder))
    {
        echo "<h1 class='one'>File Uploaded!!</h1>".$tempname;
    }
    else
    {
        echo "<h1>Failed</h1>";
    }
    $tablename = "P_".$pnum;
    $sql = "CREATE TABLE $tablename ( sno int(4) NOT NULL,date DATE, filename varchar(100), dname varchar(100), dnum varchar(20), PRIMARY KEY (sno))";
    $run1 = mysqli_query($conn,$sql);
    if(!$run1)
    {
        echo mysqli_error($conn);
    }
    //date doctor filname,docphone
}
?>