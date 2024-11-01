<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $staff_id = $_POST['staff_id'];
    $order_details = $_POST['order_details'];
    $order_date = date("Y-m-d H:i:s"); // Current date and time

    // Check if the customer exists
    $customer_check = $conn->prepare("SELECT * FROM Customers WHERE customer_id = ?");
    $customer_check->bind_param("i", $customer_id);
    $customer_check->execute();
    $customer_result = $customer_check->get_result();

    if ($customer_result->num_rows === 0) {
        die("Error: Customer ID $customer_id does not exist.");
    }

    // Check if the staff exists
    $staff_check = $conn->prepare("SELECT * FROM Staff WHERE staff_id = ?");
    $staff_check->bind_param("i", $staff_id);
    $staff_check->execute();
    $staff_result = $staff_check->get_result();

    if ($staff_result->num_rows === 0) {
        die("Error: Staff ID $staff_id does not exist.");
    }

    // Prepared statement to insert the order
    $stmt = $conn->prepare("INSERT INTO Orders (customer_id, staff_id, order_details, order_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $customer_id, $staff_id, $order_details, $order_date);

    try {
        if ($stmt->execute()) {
            echo "New order created successfully.";
            header("Location: view_orders.php"); // Redirect to view orders
            exit();
        } else {
            throw new Exception("Error adding order: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "<p class='error'>".$e->getMessage()."</p>";
    }

    $stmt->close();
}
$conn->close();
?>
