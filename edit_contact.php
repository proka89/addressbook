<?php

require 'config/config.php';

$id = (isset($_POST['id']) ? $_POST['id'] : '');

$first_name = mysqli_real_escape_string($db, $_POST['firstname']);
$last_name = mysqli_real_escape_string($db, $_POST['lastname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);

$sql = "UPDATE contacts SET first_name = $first_name, last_name = $last_name, email = $email, phone = $phone WHERE id = $id";

if(mysqli_query($db, $sql)){
    echo "Records edited successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

// close connection
mysqli_close($db);
?>
