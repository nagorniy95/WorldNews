
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

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$db = Database::getDb();

	$sql = "SELECT * FROM users WHERE id = :id";

	$pst = $db->prepare($sql);
	$pst->bindParam(':id', $id);
	$pst->execute();

	$user = $pst->fetch(PDO::FETCH_OBJ);

	//var_dump($blog);
}	
if(isset($_POST['updateuser'])){
	$id = $_POST['id'];
	$user_type = $_POST['user_type'];

	$db = Database::getDb();
	$u = new User();

	$count = $u->updateUserPrivilage($id,$user_type,$db);

	if($count){
    ?>
    <script type="text/javascript">
    window.location.href = "login-admin.php";
    </script>
    <?php
	}else{
		echo "problem showing blog table values";
	}
}

?>


<main>
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
      <h2>Edit User Privilage</h2>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user->id ?>" />
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">User Type:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="user_type" value="<?= $user->user_type ?>"/>
          </div>
        </div>
        <div class="text-center">
        <input type="submit" name="updateuser" value="Edit" class="btn btn-primary btn-lg">   
        </div>                                    
      </form>
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

</main>
<?php include '../footer.php'; ?>