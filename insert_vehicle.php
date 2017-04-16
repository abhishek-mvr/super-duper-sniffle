<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"carpooldb");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$mname=$_POST['mname'];
$rno=$_POST['rno'];
$vdesc=$_POST['vdesc'];
$nos=$_POST['nos'];
$imagename=$_FILES["myimage"]["name"];


//$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
$sql2 = $_SESSION['query'];
$sql = "INSERT INTO vehicle (v_model, v_rno, v_desc,v_seat,v_image) VALUES ('$mname', '$rno', '$vdesc','$nos','$imagename')";
$result = $conn->query($sql);
$sql1= "select v_id from vehicle where v_model='$mname' and v_rno='$rno'";
$result = $conn->query($sql);
$sql2=$sql2.$result.'"';
$result = $conn->query($sql);
echo $result;
?>
