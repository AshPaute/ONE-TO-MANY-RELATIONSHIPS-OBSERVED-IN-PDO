<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Staff</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Add Staff Member</h2>
        <form action="insert_staff.php" method="POST">
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="text" name="position" placeholder="Position" required><br>
            <input type="submit" class="button" value="Add Staff">
        </form>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
