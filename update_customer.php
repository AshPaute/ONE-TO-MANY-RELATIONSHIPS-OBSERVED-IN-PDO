<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Customer</h2>
        <form action="update_customer_process.php" method="POST">
            <input type="hidden" name="customer_id" value="<?php echo $_GET['id']; ?>">
            <input type="text" name="name" placeholder="New Name" required><br>
            <input type="email" name="email" placeholder="New Email" required><br>
            <input type="text" name="phone" placeholder="New Phone" required><br>
            <input type="submit" class="button" value="Update Customer">
        </form>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
