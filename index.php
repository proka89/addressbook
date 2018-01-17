<!DOCTYPE html>
<html lang="en">
<head>
  <title>Addressbook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
<?php
  require 'config/config.php';
  $result = $db->query("SELECT first_name, last_name, email, phone FROM contacts") or die($db->error);
?>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>Addressbook</h1>
    </div>
    <div class="col-sm-6">
      <a href="#" class="add-btn btn btn-primary btn-md " role="button" data-toggle="modal" data-target="#addcontact-modal">Add Contact</a>
      <div class="modal fade" id="addcontact-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="contacts.php" method="post">
                <div class="form-group">
                  <label>First Name:</label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name="firstname">
                </div>
                <div class="form-group">
                  <label>Last Name:</label>
                  <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname">
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" placeholder="Enter email Address" name="email">
                </div>
                <div class="form-group">
                  <label>Phone Number:</label>
                  <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table>
        <thead>
          <tr>
            <th width="190">Name</th>
            <th width="150">Phone</th>
            <th width="220">Email</th>
            <th width="170">Actions</th>
          </tr>
        </thead>
        <?php
          echo "<tbody>";
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo "<tr>";
                  echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . '<div class="btn-group">' . '<a href="#" class="btn btn-primary" role="button">'
                   . "Edit" . '</a>' . '<a href="#" class="btn btn-danger" role="button">' . "Delete" . '</a>' . "</div>" . "</td>";
                echo "</tr>";
              }
            } else {
              echo "Addressbook is empty";
            }
          echo "</tbody>";
          $db->close();
        ?>
      </table>
    </div>
  </div>
</div>

</body>
</html>
