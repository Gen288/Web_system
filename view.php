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

$result = $conn->query("SELECT * FROM contacts");

echo "<h2> Contact List </h2>" ;
echo "<a href = 'index.html'>Add New Contact</a> <br><br> ";
echo "<table border = '1' cellpadding ='10'>
      <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Action</th> </tr>";

while($row = $result->fetch_assoc())
{
  echo "<tr>
        <td> {$row['id']} </td> 
        <td> {$row['name']} </td>
        <td> {$row['email']} </td>
        <td>
        <a href = 'edit.php?id={$row['id']}'> Edit </a> |
        <a href = 'delete.php?id={$row['id']}' onclick = 'return confirm (\"Are you sure?\")'> Delete </a>
        </td>
        </tr>";
}

echo "</table>";

$conn->close();


?>