<?php

require_once 'db.php'; //modularize connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    $sql = "SELECT UserID, Password FROM userLogin WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $user['UserID'];
            $_SESSION['username'] = $username; // Store username in session
            header("Location: ../Website/MainPage.php"); // Redirect to user orders page
            exit;
        }
    }
    header("Location: ../Website/userlogin.php?error=invalid");
    exit;
} else {
    header("Location: ../Website/userlogin.php?error=invalid");
    exit;
}
?>
