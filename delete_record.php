<?php
include 'db.php';

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type === 'order') {
        $stmt = $conn->prepare("DELETE FROM Orders WHERE order_id = ?");
    } elseif ($type === 'customer') {
        $stmt = $conn->prepare("DELETE FROM Customers WHERE customer_id = ?");
    } elseif ($type === 'staff') {
        $stmt = $conn->prepare("DELETE FROM Staff WHERE staff_id = ?");
    } else {
        die("Invalid type specified.");
    }

    $stmt->bind_param("i", $id);

    try {
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
            header("Location: view_orders.php"); // Redirect after deletion
            exit();
        } else {
            throw new Exception("Error deleting record: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "<p class='error'>".$e->getMessage()."</p>";
    }

    $stmt->close();
}
$conn->close();
?>
