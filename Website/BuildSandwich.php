<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Build Your Own Sandwich</title>
    <link rel="stylesheet" href="MainPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <h1>Build Your Own Sandwich</h1>
    <form id="sandwichForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <?php
        // Create connection
        $conn = new mysqli("localhost", "root", "", "swisshogans");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch options for meats and cheeses
        function createSelectOptions($conn, $tableName) {
            $result = $conn->query("SELECT Name, Price FROM $tableName");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['Name'] . "' data-price='" . $row['Price'] . "'>" . $row['Name'] . "</option>";
            }
        }

        // Meat options
        echo '<div class="ingredient-section">';
        echo '<label for="meat">Choose your meat:</label>';
        echo '<select name="meat" id="meat">';
        createSelectOptions($conn, 'Meats');
        echo '</select>';
        echo '</div>';

        // Cheese options
        echo '<div class="ingredient-section">';
        echo '<label for="cheese">Choose your cheese:</label>';
        echo '<select name="cheese" id="cheese">';
        createSelectOptions($conn, 'Cheeses');
        echo '</select>';
        echo '</div>';

        // Topping options
        $toppingNames = ['Mayo', 'Lettuce', 'Tomato', 'Onion', 'Mustard', 'Ranch', 'ItalianDressing', 'HotSauce', 'Marinara', 'Mushrooms', 'Jalapenos', 'BananaPeppers', 'Sauerkraut', 'ThousandIslandDressing', 'SauteedOnions', 'SauteedPeppers'];
        $toppingCounter = 1;
        foreach ($toppingNames as $toppingName) {
            echo '<div class="ingredient-section">';
            echo '<label for="' . strtolower($toppingName) . '">Topping ' . $toppingCounter . ':</label>';
            echo '<select name="' . strtolower($toppingName) . '" id="' . strtolower($toppingName) . '">';
            createSelectOptions($conn, 'Toppings');
            echo '</select>';
            echo '</div>';
            $toppingCounter++;
}

        $conn->close();
        ?>  
        <div class="ingredient-section">
            <p>Total Price: $
            <span id="totalPrice">0.00</span></p>
            <input type="hidden" name="totalPrice" id="hiddenTotalPrice">
        </div>

        <input type="submit" value="Submit Order">
    </form>
       
        
        <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Create connection
        $conn = new mysqli("localhost", "root", "", "swisshogans");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Collect all inputs
        $meat = $_POST['meat'];
        $cheese = $_POST['cheese'];
        $totalPrice = $_POST['totalPrice'];
        $orderNo = time() . rand(1000, 9999);  // Generating a unique OrderNo

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO SANDWICH_ORDER (OrderNo, Price, Quantity, TakeOut, OrderDate, Bread) VALUES (?, ?, ?, ?, ?, ?)");
        $quantity = 1;  // Default quantity for custom sandwiches
        $takeOut = 1;   // Assuming take out is always true for online orders
        $orderDate = date('Y-m-d');  // Current date
        $bread = 'White Bread';  // Default bread type, you can customize this if needed

        $stmt->bind_param("sdiiss", $orderNo, $totalPrice, $quantity, $takeOut, $orderDate, $bread);
        if ($stmt->execute()) {
            echo "Order placed successfully. Order No: $orderNo";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <script>
        $(document).ready(function() {
            // Update total price when ingredient selections change
            $('#sandwichForm').on('change', 'select', function() {
                updatePrice();
            });
        });

        function updatePrice() {
            var totalPrice = 0;
            $('#sandwichForm select').each(function() {
                totalPrice += parseFloat($(this).find(':selected').data('price'));
            });
            $('#totalPrice').text(totalPrice.toFixed(2));
            $('#hiddenTotalPrice').val(totalPrice.toFixed(2)); // Update hidden input to submit form
        }
    </script>
</body>
</html>