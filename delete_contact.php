<?php

require 'config/config.php';

$id = $_POST['id'];

$query = "DELETE FROM contacts WHERE id = $id";

$result = mysqli_query($db,$query);
