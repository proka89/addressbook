<?php

require 'config/config.php';

$first_name = mysqli_real_escape_string($db, $_POST['firstname']);
$last_name = mysqli_real_escape_string($db, $_POST['lastname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);

$sql = "INSERT INTO contacts (first_name, last_name, email, phone)
VALUES ('$first_name', '$last_name', '$email', '$phone')";

if(mysqli_query($db, $sql)){
    echo "Contact added successfully. <br><br>
    <a href='index.php'>View Updated Record</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

// close connection
mysqli_close($db);
?>
