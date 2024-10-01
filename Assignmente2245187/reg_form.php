<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_reg";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$nic = $_POST['nic'];


$sql = "INSERT INTO personal_info (name, gender, dateofbirth, nic) 
        VALUES ('$name', '$gender', '$dob', '$nic')";





$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Readers</title>
    <style>
      table, th, td {
    border-width: 3px;   
    border-style: double; 
    border-color: black;  
    border-collapse: collapse; 
    padding: 8px;
    text-align: left;
}
 </style>
</head>
<body>

<h2>Book Readers</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>NIC</th>
    </tr>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'library_reg');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, gender, dateofbirth, nic FROM personal_info";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["dateofbirth"] . "</td>";
            echo "<td>" . $row["nic"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No records found</td></tr>";
    }

    
    $conn->close();
    ?>

</table>

</body>
</html>
