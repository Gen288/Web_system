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

$name = $_POST['name'];
$email = $_POST['email'];

if(empty($name) || empty($email))
{
  die("Please fill out all fields.");
}

$sql = "INSERT INTO contacts (name, email) VALUES ('$name', '$email')";

if($conn->query($sql) === TRUE)
{
  echo "Contact Saved";
}
else
{
  echo "Error: " . $conn->error; 
}

$conn->close();

header("Location: view.php");
exit();


?>