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
    <br><br><br><br>
    
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
        createSelectOptions($conn, 'meats');
        echo '</select>';
        echo '</div>';

        // Cheese options
        echo '<div class="ingredient-section">';
        echo '<label for="cheese">Choose your cheese:</label>';
        echo '<select name="cheese" id="cheese">';
        createSelectOptions($conn, 'cheeses');
        echo '</select>';
        echo '</div><br>';

        // Topping options
        $sql = "SELECT * FROM custom_sandwiches LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                foreach($row as $key => $value) {
                    if($key != 'Meat' && $key != 'Cheese' && $key != 'ID') {
                        echo "<input type='checkbox' name='items[]' value='$key'> $key <br>";
                    }
                }
            }
        }
        else {
            echo "failure";
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
        $items = $_POST['items'];
        $orderNo = rand(10000000, 99999999); // Generating a unique OrderNo

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

        // Add new sandwich to custom_sandwiches table
        $fullItemList = array("Meat", "Cheese", "Mayo", "Lettuce", "Tomato", "Onion", "Mustard", "Ranch", "ItalianDressing", "HotSauce", "Marinara", "Mushrooms", "Jalapenos", "BananaPeppers", "Saurkraut", "ThousandIslandDressing", "SauteedOnions", "SauteedPeppers");
        $newRow = "INSERT INTO custom_sandwiches (ID) VALUES ($orderNo)";
        $conn->query($newRow);
        foreach($fullItemList as $col) {
            foreach($items as $item) {
                if($item == $col)
                $conn->query("UPDATE custom_sandwiches SET $item = 1 WHERE ID = $orderNo");
            }
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