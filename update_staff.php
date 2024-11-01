<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Staff</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Staff Member</h2>
        <form action="update_staff_process.php" method="POST">
            <input type="hidden" name="staff_id" value="<?php echo $_GET['id']; ?>">
            <input type="text" name="name" placeholder="New Name" required><br>
            <input type="text" name="position" placeholder="New Position" required><br>
            <input type="submit" class="button" value="Update Staff">
        </form>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
