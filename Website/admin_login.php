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
        </ul>
    </div>
    <h1>Admin Login</h1>
    <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>

    <?php
        session_start();
        if(isset($_SESSION['loggedin'])){
            header("Location: ./admin.php");
        }

        require '../PHP_Scripts/db.php'; //modularize connection

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['username']) || empty($_POST['password'])){
                echo '<p style="color:red;">Username and Password Must Be Entered. Please try again.</p>';
            }
    
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $sql = "SELECT * FROM admin WHERE username = ? AND pass = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 0){
                echo '<p style="color:red;">Invalid username or password. Please try again.</p>';
                $conn->close();
            }
            else{
                $_SESSION['loggedin']= true;
                $_SESSION['timeout'] = time();
                header("Location: ../Website/admin.php");
                $conn->close();
                die();
            }


            /* Validate credentials
            if ($username === "root" && $password === "root") {
                $_SESSION['loggedin'] = true; 
                header("Location: ../Website/admin.php");
                exit;
            } else {
                header("Location: ../Website/admin_login.php?error=invalid");
                exit;
            }
        } else {
            header("Location: ../Website/admin_login.php?error=invalid");
            exit;*/
    }

?>

</body>
</html>
