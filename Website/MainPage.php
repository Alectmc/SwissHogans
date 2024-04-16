<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="MainPage.css">
        <link type="text/css" rel="stylesheet" href="MainPage.css" />
    </head>
    <title></title>

    <body>
        <div id="div_nav">
            <ul id="ul_nav">
                <li><a href="./MainPage.php">Menu</a></li>
                <li><a href="./OrderPage.php">Order</a></li>
            </ul>
        </div>
        <img src="./img.png">
        <br>
        <br>
        <h1>Welcome to Swiss Hogans!</h1>

        <?php
            $server = "localhost";
            $username = "root";
            $password = "";
            $dbname = "swisshogans";

            $conn = new mysqli($server, $username, $password, $dbname);

            // Get pre-made sandwiches
            $getSandwiches = "SELECT *
                                FROM sandwiches
                                WHERE SandwichID BETWEEN 1 AND 9";

            $result = mysqli_query($conn, $getSandwiches);

            echo "<ol>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                foreach($row as $value) { // get the value for each row
                    echo "<td>" . $value . "</td>"; 
                }
                echo "</li>";

            };

        ?>


    </body>
</html>