<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $name = $_POST['name'];
    $position = $_POST['position'];

    $sql = "UPDATE Staff SET name='$name', position='$position' WHERE staff_id='$staff_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Staff updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<a href="index.php" class="button">Go Back to Home</a>
