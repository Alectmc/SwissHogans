<!DOCTYPE html>

<html>
    <head>
 
        <link type="text/css" rel="stylesheet" href="MainPage.css" />

    </head>
    <title></title>

    <body>
        <div id="div_nav">
            <ul id="ul_nav">
                <li><a href="./MainPage.php">Menu</a></li>
                <li><a href="./OrderPage.php">Order</a></li>
                <li><a href="./BuildSandwich.php">Create Sandwich</a></li>
                <li><a href="./orderLookup.php">Order Lookup</a></li>
                <li><a href="./admin_login.php">Admin</a></li>
            </ul>
        </div>
        <img src="./img.png">
        <br><br><br><br>
        <h1>You Have Been Logged Out.</h1>

		<br>

		<?php
			//If logged in, destroy logged in session.
			//Otherwise, redirect to homepage.
			session_start();

			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE){
				session_destroy();
			}
			else{
				header("Location: ../Website/MainPage.php");
				die();
			}
		?>


    </body>
</html>