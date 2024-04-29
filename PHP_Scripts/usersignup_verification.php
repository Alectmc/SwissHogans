<?php
session_start();
require_once 'db.php';  //modularize connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $checkUser = $conn->prepare("SELECT Username FROM userLogin WHERE Username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $checkUser->store_result();
    if ($checkUser->num_rows > 0) {
        $checkUser->close();
        header("Location: ../Website/usersignup.php?error=usertaken");
        exit;
    }

    // Insert new user into the database
    $stmt = $conn->prepare("INSERT INTO userLogin (Username, Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        header("Location: ../Website/userlogin.php?signup=success");
        exit;
    } else {
        header("Location: ../Website/usersignup.php?error=signuperror");
        exit;
    }
}
?>
