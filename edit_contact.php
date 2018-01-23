<?php
require 'config/config.php';

$id = $_REQUEST['id'];

$query = "SELECT * FROM contacts WHERE id = $id";
$result = mysqli_query($db, $query) or die ( mysqli_error($db));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
  <?php
    $status = "";
    if(isset($_POST['new']) && $_POST['new']==1)
    {
    $id = $_REQUEST['id'];
    $first_name = $_REQUEST['firstname'];
    $last_name = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $update = "UPDATE contacts SET first_name = '".$first_name."', last_name = '".$last_name."', email = '".$email."', phone = '".$phone."' WHERE id = '".$id."'";
    mysqli_query($db, $update) or die(mysqli_error());
    $status = "Contact Updated Successfully. </br></br>
    <a href='index.php'>View Updated Record</a>";
    echo '<p style="color:#FF0000;">'.$status.'</p>';
    }else {
  ?>
  <div class="container">
    <h2>Edit User Data</h2>
    <form name="form" method="post" action="" class="form-horizontal">
      <input type="hidden" name="new" value="1" />
      <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
      <div class="form-group">
        <label class="control-label col-sm-2">First Name:</label>
        <div class="col-sm-4">
          <input type="text" name="firstname" placeholder="Enter First Name" class="form-control" required value="<?php echo $row['first_name'];?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Last Name:</label>
        <div class="col-sm-4">
          <input type="text" name="lastname" placeholder="Enter Last Name" class="form-control" required value="<?php echo $row['last_name'];?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Email:</label>
        <div class="col-sm-4">
          <input type="text" name="email" placeholder="Enter Email" class="form-control" required value="<?php echo $row['email'];?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Phone:</label>
        <div class="col-sm-4">
          <p><input type="text" name="phone" placeholder="Enter Phone" class="form-control" required value="<?php echo $row['phone'];?>" /></p>
        </div>
      </div>
      <p><input name="submit" type="submit" value="Update" class="btn btn-default" /></p>
    </form>
    <?php } ?>
  </div>
</body>
</html>
