<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="admin_login.css" />
    <title>Admin Login</title>
    <script src="admin_login.js"></script>
</head>
<body>
    <div id="div_nav">
        <ul id="ul_nav">
            <li><a href="./MainPage.php">Menu</a></li>
            <li><a href="./OrderPage.php">Order</a></li>
            <li><a href="./admin_login.php">Admin</a></li>
            <li><a href="./BuildSandwich.php">Create Sandwich</a></li>
            <li><a href="./userlogin.php">Login</a></li>
            <li><a href="./usersignup.php">Signup</a></li>
        </ul>
    </div>
    <h1>Admin Login</h1>
    <form name="loginForm" action="../PHP_Scripts/admin_verification.php" method="post" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
        echo '<p style="color:red;">Invalid username or password. Please try again.</p>';
    }
    ?>
</body>
</html>
