<?php
$conn = mysqli_connect("localhost","root","","data_stethoscope");

if(!$conn)
{
    echo "failed";

}
//error reporting 
ini_set ("display_errors", "1");
error_reporting(E_ALL);

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
    $tablename = "P_".$pnum;
    echo $tablename;
    $query1 = "SELECT * FROM $tablename";
    $run1 = mysqli_query($conn, $query1);
    if(!$run1)
    {
    echo mysqli_error($conn);
    }
    while($row = mysqli_fetch_assoc($run1)) 
    {
        echo "sno : {$row['sno']}<br>".
            " DATE :{$row['date']}<br> ".
            "filename : {$row['filename']} <br> ".
           "dname :{$row['dname']}<br>". 
           "dnum : {$row['dnum']}<br>";
        $filename = "/Data-storage/uploads/patient/".$row['filename'];  
        echo '<a href= "'.$filename.'" target="_blank"><button>Download</button></a>';
     
    } 
    
    echo "<a href= 'dupload.html' target='_blank'><button>Upload</button></a>";

}


?>