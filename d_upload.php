<?php
echo "<style> background-url('Minimalistic_cheddi.jpg')</style>"

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
    
    session_start();
    $tablename = $_SESSION['tablenameup'];
    $dname = $_SESSION['docname'];
    $dnum = $_SESSION['docnum'];
    $sno = $_POST['sno'];
    $date = $_POST['date'];
    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    echo $filename;
    $folder = "uploads/patient/".$filename;

    $query = "INSERT INTO $tablename values('$sno','$date','$filename','$dname','$dnum')";
    $run = mysqli_query($conn,$query);
    
    //check query
    if($run)
    {
        echo "success";

    }
    else
    {
        echo mysqli_error($conn);
    }
    
    //move files
    if(move_uploaded_file($tempname,$folder))
    {
        echo "Worked for Windows ";
    }
    else
    {
        echo "Worked for Mac ;)";
    }

}
?>