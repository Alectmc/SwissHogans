<!DOCTYPE html>
<html>
<head>
    <title>Swiss Hogans Sandwiches</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>
            Enter name of sandwich (Only if Custom):
            <input type="text" name="SandName">
        </label><br>
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
            <input type="checkbox" name="ItalianDressing" value="1">
        </label><br><label>
		Hot Sauce:
            <input type="checkbox" name="HotSauce" value="1">
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
            <input type="checkbox" name="BananaPeppers" value="1">
        </label><br><label>
            Sauerkraut:
            <input type="checkbox" name="Sauerkraut" value="1">
        </label><br><label>
            Thousand Island Dressing:
            <input type="checkbox" name="ThousandIslandDressing" value="1">
        </label><br><label>
            Sauteed Onions:
            <input type="checkbox" name="SauteedOnions" value="1">
        </label><br><label>
            Sauteed Peppers:
            <input type="checkbox" name="SauteedPeppers" value="1">
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
			
			
			//$Bread = $_POST["Bread"]; UNDER CONSTRUCTION
            $Name = $_POST["SandName"];
            $Meat = $_POST["Meat"];
            $Cheese = $_POST["Cheese"];

			$Mayo = $_POST["Mayo"];
            $Lettuce = $_POST["Lettuce"];
            $Tomato = $_POST["Tomato"];

			$Onion = $_POST["Onion"];
            $Mustard = $_POST["Mustard"];
            $Ranch = $_POST["Ranch"];

			$ItalianDressing = $_POST["ItalianDressing"];
            $HotSauce = $_POST["HotSauce"];
            $Marinara = $_POST["Marinara"];

			$Mushrooms = $_POST["Mushrooms"];
            $Jalapenos = $_POST["Jalapenos"];
            $BananaPeppers = $_POST["BananaPeppers"];

            $Sauerkraut = $_POST["Sauerkraut"];
            $ThousandIslandDressing = $_POST["ThousandIslandDressing"];
            $SauteedOnions = $_POST["SauteedOnions"];
            $SauteedPeppers = $_POST["SauteedPeppers"];

            //If a box is not checked, set variable to NULL
            //NULL will then be set for each column when the query is run.
            if(empty($Mayo)){
                $Mayo = "NULL";
            }
            if(empty($Lettuce)){
                $Lettuce = "NULL";
            }
            if(empty($Tomato)){
                $Tomato = "NULL";
            }
            if(empty($Onion)){
                $Onion = "NULL";
            }
            if(empty($Mustard)){
                $Mustard = "NULL";
            }
            if(empty($Ranch)){
                $Ranch = "NULL";
            }
            if(empty($ItalianDressing)){
                $ItalianDressing = "NULL";
            }
            if(empty($HotSauce)){
                $HotSauce = "NULL";
            }
            if(empty($Marinara)){
                $Marinara = "NULL";
            }
            if(empty($Mushrooms)){
                $Mushrooms = "NULL";
            }
            if(empty($Jalapenos)){
                $Jalapenos = "NULL";
            }
            if(empty($BananaPeppers)){
                $BananaPeppers = "NULL";
            }
            if(empty($Sauerkraut)){
                $Sauerkraut = "NULL";
            }
            if(empty($ThousandIslandDressing)){
                $ThousandIslandDressing = "NULL";
            }
            if(empty($SauteedOnions)){
                $SauteedOnions = "NULL";
            }
            if(empty($SauteedPeppers)){
                $SauteedPeppers = "NULL";
            }
            
            // Connect to your MySQL database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "SwissHogans";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            echo "Connection Made... <br>";
            

            // Prepare SQL statement to insert the bread, meat, and cheese values into the sandwiches table
            $maxQuery = "SELECT MAX(SandwichID) AS 'MaxID' FROM SANDWICHES";
            $maxResult = mysqli_query($conn, $maxQuery);
            $maxAssoc = mysqli_fetch_assoc($maxResult);
            $maxSandwichID = $maxAssoc["MaxID"];
            echo "QUERY MADE: $maxSandwichID <br>";
            $maxSandwichID = $maxSandwichID + 1;
            echo "New MAXID = $maxSandwichID <br>";
            echo "$Name, $Meat, $Cheese, $Mayo, $Lettuce, $Tomato, $Onion, $Mustard, $Ranch, $ItalianDressing, $HotSauce, $Marinara, $Mushrooms, $Jalapenos, $BananaPeppers, $Sauerkraut, $ThousandIslandDressing, $SauteedOnions, $SauteedPeppers, $maxSandwichID <br>";
            $sql = "INSERT INTO SANDWICHES VALUES ('$Name', '$Meat', '$Cheese', $Mayo, $Lettuce, $Tomato, $Onion, $Mustard, $Ranch, $ItalianDressing, $HotSauce, $Marinara, $Mushrooms, $Jalapenos, $BananaPeppers, $Sauerkraut, $ThousandIslandDressing, $SauteedOnions, $SauteedPeppers, $maxSandwichID)";

            echo "$Mayo, $Lettuce DONE <br>";
            echo "Attempting SQL query";

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
