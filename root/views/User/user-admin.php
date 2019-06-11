<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/User.php';

$dbcon = Database::getDb();

$u = new User();
$myuser = $u->getAllUsers(Database::getDb());

$page_title = "World News";

include "../header.php";
?>

<div class="user-admin">
  <div class="container">   
    <table class="table table-responsive p-5 text-center" style="margin-top: 5px;">
      <thead class="thead">
        <tr>
          <th>User Name</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th> Email </th>
          <th>User Type</th>
          <th>Edit User Privilage</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($myuser as $user){
        echo "" .  
        "<tr>" .
          "<td class='w-25 font-weight-bold'>" . $user->username . "</td>" .
          "<td>" . $user->first_name . "</td>".
          "<td>" . $user->last_name . "</td>".
          "<td>" . $user->email . "</td>" .
          "<td class='w-25'>" . $user->user_type. "</td>" . 
          "<td>" .
            "<form action='userAdminEdit.php' method='post'>" .
              "<input type='hidden' name='id' value='$user->id' />" .
              "<input class='btn float-left' type='submit' name='update' value='Update' />" .
            "</form>" .
          "</td>" .                
        "</tr>";
      }
      ?>
      </tbody>
    </table>
    <div class="text-center">
      <a href="admin.php" class="btn p-3 m-5">Back to Admin Panel</a>
    </div>
  </div>
</div>

<?php include "../footer.php"; ?>