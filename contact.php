<?php
    $insert = false;
    if (isset($_POST['name'])) 
    {   
        // Set Connection variables
        $server = "localhost";
        $username = "root";
        $password = "";
        
        // Create a database connection
        $con = mysqli_connect($server, $username, $password);

        // Check For Connection Success
        if(!$con)
        {
            die("Connection to this database failed due to ". mysqli_connect_error());
        }

        // echo "Success Connect to the db"
        // Collect POST variable
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO `trip`.`trip2` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message');";
        // echo $sql;

        // Execute the Query
        if($con->query($sql)==true)
        {
            //Flag for successful insertion
            $insert = true;
            //echo "successfully inserted";

        }
        else
        {
            echo "Error: $sql <br> $con->error";
        }

        //Close the database connection
        $con->close();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <div class="contact-form">
            <form action="contact.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button >Submit</button>
                    <?php
            if ($insert == true) {
                echo "<p class='submitMsg'>
                Thanks for submitting the form.
            </p>";
            }
        ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
