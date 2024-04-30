<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="admin_login.css" />
    <title>Order Lookup</title>
</head>
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
    <h1>Order Lookup</h1>
    <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <label for="ordernum">Order ID:</label>
        <input type="number" id="ordernum" name="ordernum" required><br>
        <input type="submit">
    </form> <br>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST['ordernum'])){
                echo "<p style='color: red;'>Order ID is required.</p>";
            }
            else{
                $orderID = $_POST['ordernum'];

                // Database connection setup
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "swisshogans";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, OrderNo, OrderStatus FROM sandwich_order WHERE id = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $orderID);
                $stmt->execute();

                $result = $stmt->get_result();

                if($result->num_rows == 0){
                    echo "<p style='color: red; font-size: 24px;'>No Orders Found!</p>";
                }
                else{

                    echo "<p style='color: green; font-size: 24px;'>ORDER FOUND!</p>";

                    echo "<table>";
                    echo "<tr><th>Order ID</th><th>Order Number</th> <th>Order Status</th></tr>";

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        foreach($row as $value){
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        }

    ?>

</body>
</html>
