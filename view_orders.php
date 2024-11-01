<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Order List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Staff ID</th>
                    <th>Order Date</th>
                    <th>Order Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Orders";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["customer_id"] . "</td>";
                        echo "<td>" . $row["staff_id"] . "</td>";
                        echo "<td>" . $row["order_date"] . "</td>";
                        echo "<td>" . $row["order_details"] . "</td>";
                        echo "<td>
                                <a href='update_order.php?id=" . $row["order_id"] . "' class='button'>Update</a>
                                <a href='delete_record.php?id=" . $row["order_id"] . "&type=order' class='button'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="button">Go Back to Home</a>
    </div>
</body>
</html>
