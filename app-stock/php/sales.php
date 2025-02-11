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
    $item_id = $_POST['item_id'];
    $quantity_sold = $_POST['quantity_sold'];

    // Fetch current quantity and price
    $sql = "SELECT quantity, price FROM items WHERE id='$item_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $current_quantity = $row['quantity'];
    $price = $row['price'];

    // Update quantity and total amount
    $new_quantity = $current_quantity - $quantity_sold;
    $total_amount = $new_quantity * $price; // Recalculate total amount

    $sql = "UPDATE items SET quantity='$new_quantity', total_amount='$total_amount' WHERE id='$item_id'";
    if ($conn->query($sql)) {
        echo "Sales recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>