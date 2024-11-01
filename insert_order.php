<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $staff_id = $_POST['staff_id'];
    $order_date = $_POST['order_date'];
    $order_details = $_POST['order_details'];

    $sql = "INSERT INTO Orders (customer_id, staff_id, order_date, order_details) VALUES ('$customer_id', '$staff_id', '$order_date', '$order_details')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<a href="index.php" class="button">Go Back to Home</a>
