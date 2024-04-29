<?php
require_once 'db.php'; //modularize connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo '<p style="color:red;">Invalid username or password. Please try again.</p>';
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
