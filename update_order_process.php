<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $staff_id = $_POST['staff_id'];
    $order_details = $_POST['order_details'];

    $stmt = $conn->prepare("UPDATE Orders SET customer_id = ?, staff_id = ?, order_details = ? WHERE order_id = ?");
    $stmt->bind_param("iisi", $customer_id, $staff_id, $order_details, $order_id);

    try {
        if ($stmt->execute()) {
            echo "Order updated successfully.";
            header("Location: view_orders.php"); // Redirect to view orders
            exit();
        } else {
            throw new Exception("Error updating order: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "<p class='error'>".$e->getMessage()."</p>";
    }
    
    $stmt->close();
}
$conn->close();
?>
