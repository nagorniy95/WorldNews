<?php 

require_once '../../model/Database.php';
require_once '../../model/User.php';

session_start();
// it will redirect to login page if we dont have the login or register information in a session.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}
else if( $_SESSION["user_type"] == "user"){
?>
  <script type="text/javascript">
  alert("You are not authorized to access this page!");
  window.location.href="welcome.php";
  </script>
<?php
}

$dbcon = Database::getDb();
$u = new User();
$myuser = $u->getAllUsers($dbcon);

$page_title = "World News";

include '../header.php';
 ?>
 
<div class="container-fluid p-0">
    <div class="row no-gutters">
            <div class="col-md-2">
                <div class="admin-menu-wrapper">
                    <ul>
                        <li class="bb"><a href="#">Home</a></li>
                        <li class="bb">Pages <span class="admin-right">></span>
                            <ul>
                                <li>Sport <span class="admin-right">></span>
                                    <ul>
                                        <li><a href="category-admin.php">Category</a></li>
                                        <li><a href="sport-admin.php">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Economics</a></li>
                                <li><a href="#">Crypto</a></li>
                                <li><a href="#" class="admin-menu-active">Users</li>
                            </ul>
                        </li>
                        <li><a href="#">Log Out <i class="fas fa-sign-in-alt admin-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
            <div class="user-admin">
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
                      "<form action='user-admin-edit.php' method='post'>" .
                        "<input type='hidden' name='id' value='$user->id' />" .
                        "<input class='btn' type='submit' name='update' value='Update' />" .
                      "</form>" .
                      "<form action='delete-admin.php' method='post'>" .
                      "<input type='hidden' name='id' value='$user->id' />" .
                      "<input class='btn btn-danger mt-2' type='submit' name='delete' value='Delete' />" .
                    "</form>" .
                    "</td>" .                
                  "</tr>";
                }
                ?>
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-2">
            <div class="admin-list-wrapper">
                <h3 class="admin-list-title">List of Users</h3>
                <?php 
                foreach($myuser as $user){
                echo "<p>" .  $user->username . "</p>"  ;
                }
            ?>
            </div>
        </div>
    </div>
</div>
<?php include '../footer.php'; ?>
 	

