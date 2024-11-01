<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];

    $sql = "INSERT INTO Staff (name, position) VALUES ('$name', '$position')";

    if ($conn->query($sql) === TRUE) {
        echo "Staff member added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<a href="index.php" class="button">Go Back to Home</a>
