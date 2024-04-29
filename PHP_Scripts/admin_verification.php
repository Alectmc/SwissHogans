<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate credentials
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
    exit;
}

?>
