<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register New Customer</h2>
        <form action="insert_customer.php" method="POST">
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="phone" placeholder="Phone" required><br>
            <input type="submit" class="button" value="Add Customer">
        </form>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
