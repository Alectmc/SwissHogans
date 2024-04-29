<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="OrderPage.css" />
    <title>Place Your Order</title>
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

    <img src="./img.png">
    <br><br><br><br><br>
    <h1>Place Order Below</h1>
    <h2>Order by Number</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <?php
        // Create and check database connection
        $conn = new mysqli("localhost", "root", "", "swisshogans");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch sandwich options
        $sql = "SELECT * FROM sandwiches WHERE SandwichID BETWEEN 1 AND 10";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<input type="radio" name="order" value="' . $row["SandwichID"] . '"> #' . $row["SandwichID"] . ' ' . $row["Name"] . '<br>';
            }
        }
        ?>
        Quantity (Default is 1): <input type="text" name="quantity" value="1"><br>
        Take Out: YES<input type="radio" name="takeout" value="1"> NO<input type="radio" name="takeout" value="0" checked><br>
        Bread (Default is White Bread): <input type="text" name="bread"><br>
        <input type="submit" value="Submit Order">
    </form>

    <h3>Menu:</h3>
    <ol>
        <?php
        // Display sandwich menu details
        $result->data_seek(0); // Reset result pointer to the beginning for re-use
        while($row = $result->fetch_assoc()) {
            echo "<li><b>" . $row["Name"] . "</b>: " . $row["Meat"] . ", " . $row["Cheese"] . "</li>";
        }
        ?>
        <li><b>Build Your Own!</b></li>
    </ol>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['order'])) {
            echo "Please select a sandwich option! <br>";
        } elseif (!isset($_POST['takeout'])) {
            echo "Please select take out option! <br>";
        } else {
            $orderSelection = $_POST["order"];
            $quantity = empty($_POST['quantity']) ? 1 : $_POST['quantity'];
            $takeOut = $_POST['takeout'];
            $bread = empty($_POST['bread']) ? 'White Bread' : $_POST['bread'];
            $orderDate = date('Y-m-d');
            $price = 4.99; // Example fixed price

            $stmt = $conn->prepare("INSERT INTO SANDWICH_ORDER (OrderNo, Price, Quantity, TakeOut, OrderDate, Bread, OrderStatus) VALUES (?, ?, ?, ?, ?, ?, 'In Progress')");
            $stmt->bind_param("idiiss", $orderSelection, $price, $quantity, $takeOut, $orderDate, $bread);
            if ($stmt->execute()) {
                echo "New order created successfully.<br>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $conn->close();
    }
    ?>
</body>
</html>
