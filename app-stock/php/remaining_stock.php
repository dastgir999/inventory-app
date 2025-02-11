<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch individual items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

$output = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $output .= "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Quantity: " . $row["quantity"] . " - Price: $" . number_format($row["price"], 2) . " - Total Amount: $" . number_format($row["total_amount"], 2) . "<br>";
    }
} else {
    $output = "No items found.";
}

// Fetch total quantity and total amount
$sql = "SELECT SUM(quantity) AS total_quantity, SUM(total_amount) AS total_amount FROM items";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_quantity = $row['total_quantity'];
$total_amount = $row['total_amount'];

$output .= "<br><strong>Total Quantity:</strong> " . $total_quantity . "<br>";
$output .= "<strong>Total Amount:</strong> $" . number_format($total_amount, 2);

echo $output;

$conn->close();
?>