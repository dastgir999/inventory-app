<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total_amount = $quantity * $price; // Calculate total amount

    $sql = "INSERT INTO items (name, category_id, quantity, price, total_amount) 
            VALUES ('$name', '$category_id', '$quantity', '$price', '$total_amount')";
    if ($conn->query($sql)) {
        echo "Item added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>