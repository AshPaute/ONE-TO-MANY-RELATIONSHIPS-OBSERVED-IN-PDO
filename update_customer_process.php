<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE Customers SET name='$name', email='$email', phone='$phone' WHERE customer_id='$customer_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<a href="index.php" class="button">Go Back to Home</a>
