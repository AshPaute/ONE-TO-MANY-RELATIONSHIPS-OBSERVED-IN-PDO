<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Staff</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Staff</h2>
        <table>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM Staff";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['staff_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['position']}</td>
                            <td>
                                <a href='update_staff.php?id={$row['staff_id']}'>Update</a> |
                                <a href='delete_record.php?id={$row['staff_id']}&type=staff'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No staff members found</td></tr>";
            }
            ?>
        </table>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
