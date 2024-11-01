<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
} else {
    die("Order ID not provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Order</h2>
        <form action="update_order_process.php" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
            <label for="customer_id">Customer ID:</label>
            <input type="number" id="customer_id" name="customer_id" value="<?php echo $order['customer_id']; ?>" required>

            <label for="staff_id">Staff ID:</label>
            <input type="number" id="staff_id" name="staff_id" value="<?php echo $order['staff_id']; ?>" required>

            <label for="order_date">Order Date:</label>
            <input type="date" id="order_date" name="order_date" value="<?php echo $order['order_date']; ?>" required>

            <label for="order_details">Order Details:</label>
            <textarea id="order_details" name="order_details" required><?php echo $order['order_details']; ?></textarea>

            <input type="submit" value="Update Order">
        </form>
        <a href="view_orders.php" class="button">Go Back to View Orders</a>
    </div>
</body>
</html>
