<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM items";
$result = $conn->query($sql);

$options = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
}

echo $options;

$conn->close();
?>