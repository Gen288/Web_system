<?php

//Connection to MySQL
$servername = "127.0.0.1";
$username = "root";
$password = "@Pudgeewarp02";
$dbname = "phpdemo";

$conn = new mysqli($servername, $username, $password, $dbname);

//alternative
//$conn = new mysqli("127.0.0.1", "root", "@Pudgeewarp02", "phpdemo");

//Check Connection
if($conn->connect_error)
{
  die("Connection Failed: " . $conn->connect_error);
}

$idvar = $_GET['id'];

$sql = "DELETE FROM contacts where id = $idvar";
$conn->query($sql);

$conn->close;

header("Location: view.php");
exit();

?>