<?php
include 'db.php';

// Fetch available customers
$customers_query = "SELECT customer_id, customer_name FROM Customers"; // Ensure customer_name exists
$customers_result = $conn->query($customers_query);

// Fetch available staff
$staff_query = "SELECT staff_id, staff_name FROM Staff"; // Ensure staff_name exists
$staff_result = $conn->query($staff_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Order</title>
</head>
<body>
    <h1>Add Order</h1>

    <form action="add_order_process.php" method="POST">
        <label for="customer_id">Select Customer:</label>
        <select name="customer_id" id="customer_id" required>
            <option value="">-- Select Customer --</option>
            <?php
            if ($customers_result->num_rows > 0) {
                while ($customer = $customers_result->fetch_assoc()) {
                    echo "<option value='" . $customer['customer_id'] . "'>" . $customer['customer_id'] . " - " . $customer['customer_name'] . "</option>";
                }
            } else {
                echo "<option value=''>No customers available</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="staff_id">Select Staff:</label>
        <select name="staff_id" id="staff_id" required>
            <option value="">-- Select Staff --</option>
            <?php
            if ($staff_result->num_rows > 0) {
                while ($staff = $staff_result->fetch_assoc()) {
                    echo "<option value='" . $staff['staff_id'] . "'>" . $staff['staff_id'] . " - " . $staff['staff_name'] . "</option>";
                }
            } else {
                echo "<option value=''>No staff available</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="order_details">Order Details:</label>
        <textarea name="order_details" id="order_details" rows="4" required></textarea>
        <br><br>

        <input type="submit" value="Place Order">
    </form>

    <h2>Available Customers</h2>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
        </tr>
        <?php
        if ($customers_result->num_rows > 0) {
            while ($customer = $customers_result->fetch_assoc()) {
                echo "<tr><td>" . $customer['customer_id'] . "</td><td>" . $customer['customer_name'] . "</td></tr>";
            }
        }
        ?>
    </table>

    <h2>Available Staff</h2>
    <table>
        <tr>
            <th>Staff ID</th>
            <th>Staff Name</th>
        </tr>
        <?php
        if ($staff_result->num_rows > 0) {
            while ($staff = $staff_result->fetch_assoc()) {
                echo "<tr><td>" . $staff['staff_id'] . "</td><td>" . $staff['staff_name'] . "</td></tr>";
            }
        }
        ?>
    </table>

    <button onclick="window.location.href='index.php';">Go Back</button>
    <button onclick="window.close();">Close</button>
</body>
</html>

<?php
$conn->close();
?>
