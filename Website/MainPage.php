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
            </ul>
        </div>
        <img src="./img.png">
        <br>
        <br>
        <h1>Welcome to Swiss Hogans!</h1>

        <br><br>
        <h3>Menu:</h3>

        <?php
            $server = "localhost";
            $username = "root";
            $password = "";
            $dbname = "swisshogans";

            $conn = new mysqli($server, $username, $password, $dbname);

            // Get pre-made sandwiches
            $getSandwiches = "SELECT *
                                FROM sandwiches
                                WHERE SandwichID BETWEEN 1 AND 10";

            $result = mysqli_query($conn, $getSandwiches);

            echo "<ol>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                foreach($row as $key=>$value) { // get the value for each row
                    if($key != "SandwichID") {
                        if($key == "Name") {
                            echo "<b>" . $value . "</b><br>";
                        }
                        else if($value == "1") {
                            echo ", " . $key;
                        }
                        else if($key == "Cheese") {
                            echo ", " . $value;
                        }
                        else {
                            echo "<td>" . $value . "</td>"; 
                        }
                    }
                }
                echo "</li>";

            };

        ?>


    </body>
</html>