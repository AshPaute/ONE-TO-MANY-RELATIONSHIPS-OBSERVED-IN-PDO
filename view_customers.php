<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Customers</h2>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM Customers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['customer_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>
                                <a href='update_customer.php?id={$row['customer_id']}'>Update</a> |
                                <a href='delete_record.php?id={$row['customer_id']}&type=customer'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No customers found</td></tr>";
            }
            ?>
        </table>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
