<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `habibi`.`habibi` (`Name`, `Age`, `Gender`, `Email`, `City`,`Phone`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$desc','$phone', current_timestamp());";

    // $sql=INSERT INTO `habibi`.'habibi' (`Name`, `Age`, `Gender`, `Email`, `City`, `Phone`, `Date`) VALUES ( 'Khan', '23', 'Male', 'khan@gmail.com', 'Ranchi', '9939999293', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Life</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img class="bg" src="dubai.jpg" alt="BIT Mesra">
    <div class="container">
        <h1>Welcome BIT Mesra to the Dubai Trip(Habibi)</h1>
        <p>Fill The information to confirm your participation in the Joyful adventure</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input name="text" id="city" cols="30" rows="2" placeholder="Enter your Location">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
        </form>
        <form1 action="index.php" method="post">
        <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
