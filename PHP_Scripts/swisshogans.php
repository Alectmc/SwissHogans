<!DOCTYPE html>
<html>
<head>
    <title>Swiss Hogans Sandwiches</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>
            Enter your Bread:
            <input type="text" name="Bread">
        </label><br>
        <label>
            Enter your Meat:
            <input type="text" name="Meat">
        </label><br>
        <label>
            Enter your Cheese:
            <input type="text" name="Cheese">
        </label><br>
        <input type="submit" name="submit" value="Submit">

		<!-- Checkboxes for condiments 
	
	4	Mayo	int(11)			Yes	NULL			Change Change	Drop Drop	
	5	Lettuce	int(11)			Yes	NULL			Change Change	Drop Drop	
	6	Tomato	int(11)			Yes	NULL			Change Change	Drop Drop	
	7	Onion	int(11)			Yes	NULL			Change Change	Drop Drop	
	8	Mustard	int(11)			Yes	NULL			Change Change	Drop Drop	
	9	Ranch	int(11)			Yes	NULL			Change Change	Drop Drop	
	10	ItalianDressing	int(11)			Yes	NULL			Change Change	Drop Drop	
	11	HotSauce	int(11)			Yes	NULL			Change Change	Drop Drop	
	12	Marinara	int(11)			Yes	NULL			Change Change	Drop Drop	
	13	Mushrooms	int(11)			Yes	NULL			Change Change	Drop Drop	
	14	Jalapenos	int(11)			Yes	NULL			Change Change	Drop Drop	
	15	BananaPeppers	int(11)			Yes	NULL			Change Change	Drop Drop	
With selected:  Check all -->
        <label>
            Mayo:
            <input type="checkbox" name="Mayo" value="1">
        </label><br>
        <label>
            Lettuce:
            <input type="checkbox" name="Lettuce" value="1">
        </label><br>
		<label>
		Tomato:
            <input type="checkbox" name="Tomato" value="1">
        </label><br>
		<label>
		Onion:
            <input type="checkbox" name="Onion" value="1">
        </label><br>
		<label>
		Mustard:
            <input type="checkbox" name="Mustard" value="1">
        </label><br>
		<label>
		Ranch:
            <input type="checkbox" name="Ranch" value="1">
        </label><br><label>
		Italian Dressing:
            <input type="checkbox" name="Italian Dressing" value="1">
        </label><br><label>
		Hot Sauce:
            <input type="checkbox" name="Hot Sauce" value="1">
        </label><br><label>
		Marinara:
            <input type="checkbox" name="Marinara" value="1">
        </label><br><label>
		Mushrooms:
            <input type="checkbox" name="Mushrooms" value="1">
        </label><br><label>
		Jalapenos:
            <input type="checkbox" name="Jalapenos" value="1">
        </label><br><label>
		Banana Peppers:
            <input type="checkbox" name="Banana Peppers" value="1">
        </label><br>
        <!-- Add more checkboxes for other condiments -->
        <!-- Add checkboxes for other ingredients -->
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the "Bread", "Meat", and "Cheese" input fields are set and not empty
        if (isset($_POST["Bread"]) && !empty($_POST["Bread"]) && isset($_POST["Meat"]) && !empty($_POST["Meat"]) && isset($_POST["Cheese"]) && !empty($_POST["Cheese"])) {
	
// 	4	Mayo	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	5	Lettuce	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	6	Tomato	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	7	Onion	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	8	Mustard	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	9	Ranch	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	10	ItalianDressing	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	11	HotSauce	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	12	Marinara	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	13	Mushrooms	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	14	Jalapenos	int(11)			Yes	NULL			Change Change	Drop Drop	
// 	15	BananaPeppers	int(11)			Yes	NULL			Change Change	Drop Drop	
// With selected:  Check all -->
			
			
			$Bread = $_POST["Bread"];
            $Meat = $_POST["Meat"];
            $Cheese = $_POST["Cheese"];

			$Mayo = $_POST["Mayo"];
            $Lettuce = $_POST["Lettuce"];
            $Tomato = $_POST["Tomato"];

			$Onion = $_POST["Onion"];
            $Mustard = $_POST["Mustard"];
            $Ranch = $_POST["Ranch"];

			$ItalianDressing = $_POST["Italian Dressing"];
            $HotSauce = $_POST["Hot Sauce"];
            $Marinara = $_POST["Marinara"];

			$Mushrooms = $_POST["Mushrooms"];
            $Jalapenos = $_POST["Jalapenos"];
            $BananaPeppers = $_POST["Banana Peppers"];

            // Connect to your MySQL database
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

            // Prepare SQL statement to insert the bread, meat, and cheese values into the sandwiches table
            $sql = "INSERT INTO sandwiches (Bread, Meat, Cheese, Mayo, Lettuce, Tomato, Onion, Mustard, Ranch, ItalianDressing, HotSauce, Marinara, Mushrooms, Jalapenos, BananaPeppers) VALUES ('$Bread', '$Meat', '$Cheese', '$Mayo', '$Lettuce', '$Tomato', '$Onion', '$Mustard', '$Ranch', '$ItalianDressing', '$HotSauce', '$Marinara', '$Mushrooms', '$Jalapenos', '$BananaPeppers')";

            // Execute SQL query
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "Please enter your choice of bread, meat, and cheese.";
        }
    }
    ?>
</body>
</html>
