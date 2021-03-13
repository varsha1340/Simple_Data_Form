<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "uba";
    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $db);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $specilization = $_POST['specilization'];
    $semester = $_POST['semester'];
    $sql = "INSERT INTO trip(`name`, `gender`, `email`, `contact`, `branch`, `specilization`, `semester`, `dt`) VALUES ('$name', '$gender', '$email', '$contact', '$branch', '$specilization', '$semester', current_timestamp());";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel_Data_Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <img src="bg.jpg" alt="NIT Raipur" class="bg">
    <div class="container">
        <h1>NIT Raipur UBA Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="text" name="email" id="email" placeholder="Enter Your Email">
            <input type="text" name="contact" id="contact" placeholder="Enter Your Contact No.">
            <input type="text" name="branch" id="branch" placeholder="Enter Your Branch">
            <input type="text" name="specilization" id="specilization" placeholder="Enter Your Specilization">
            <input type="text" name="semester" id="semester" placeholder="Enter Your Semester">
            <button class="btn">Submit</button>
           
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>