<?php
    require "../PHP_Scripts/session_manager.php";

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit;
}

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

// SQL query to select all orders
$sql = "SELECT * FROM sandwich_order";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link type="text/css" rel="stylesheet" href="admin.css" />
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
    <h1>All Order History</h1>
    <?php
    if ($result->num_rows > 0) {
        // Start the table and print headers
        echo "<table>";
        echo "<tr><th>Order ID</th><th>Order No</th><th>Price</th><th>Quantity</th><th>TakeOut</th><th>OrderDate</th><th>Bread</th><th>Order Status</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["OrderNo"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Quantity"] . "</td><td>" . ($row["TakeOut"] ? "Yes" : "No") . "</td><td>" . $row["OrderDate"] . "</td><td>" . $row["Bread"] . "</td><td>" . $row["OrderStatus"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>

    <h2>Select an Order to Mark as Ready!</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <select name='orderNums'>

    <?php
        $orderNoSql = "SELECT id FROM sandwich_order";
        $result = mysqli_query($conn, $orderNoSql);

        while($row = mysqli_fetch_assoc($result)){
            echo "<option>";
            foreach($row as $value){
                echo $value;
            }
            echo "</option>";
        }
        echo "<br> <input id='submitButton' type='submit'>";
        echo "</select></form> <br>";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $orderNumber = $_POST['orderNums'];

            $sqlStatus = "UPDATE sandwich_order SET OrderStatus = 'Ready' WHERE id = ?";

            $stmt = $conn->prepare($sqlStatus);
            $stmt->bind_param("i", $orderNumber);
            
            if($stmt->execute()){
                echo "<p style='color: green; font-size: 24px;'>Order Now Ready!</p>";
            }
            else{
                echo "<p style='color: red;'>Sorry, An error has occurred...</p>";
            }
        }

        $conn->close();
    ?>

</body>
</html>