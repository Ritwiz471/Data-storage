<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "failed";

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
        echo "sucess";

    }
    else
    {
        echo mysqli_error($conn);
    }
    
    //move files
    if(move_uploaded_file($tempname,$folder))
    {
        echo "Worked for Windows ".$tempname;
    }
    else
    {
        echo "Worked for Mac ;)";
    }

}
?>