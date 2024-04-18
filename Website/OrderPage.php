<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="OrderPage.css">
        <link type="text/css" rel="stylesheet" href="OrderPage.css" />
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
        <h1>Place Order Below</h1>

        <h2>Order by Number</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            #1 <input type="radio" name="order" value="1"> <br>
            #2 <input type="radio" name="order" value="2"> <br>
            #3 <input type="radio" name="order" value="3"> <br>
            #4 <input type="radio" name="order" value="4"> <br>
            #5 <input type="radio" name="order" value="5"> <br>
            #6 <input type="radio" name="order" value="6"> <br>
            #7 <input type="radio" name="order" value="7"> <br>
            #8 <input type="radio" name="order" value="8"> <br>
            #9 <input type="radio" name="order" value="9"> <br>
            #10 <input type="radio" name="order" value="10"> <br>
            #11 <input type="radio" name="order" value="11"> <br>
            <input type="submit">
        </form>

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

            echo "<li><b>Build Your Own!</b></li>";
            echo "</ol>";


            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST['order'])){
                    echo "Please select an option!";
                }
                else{
                    $orderNum = $_POST["order"];

                    if($orderNum == 11){
                        header("Location: ../PHP_Scripts/swisshogans.php");
                        $conn->close();
                        die();
                    }
                }
            }

            $conn->close();
        ?>

    </body>
</html>