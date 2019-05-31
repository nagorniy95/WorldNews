<?php
session_start();
// it will redirect to login page if we dont have the login or register information in a session.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");

    print_r($_SESSION);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- main -->
  <main>  
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?><?php echo htmlspecialchars($_SESSION["first_name"]); ?> <?php echo htmlspecialchars($_SESSION["last_name"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
    <?php
    // if user type is user then it will show Home page button that will redirect to index.php
    // else user type will be admin then it will have admin panel button that will redirect to admin.php
        if($_SESSION["user_type"] == "user"){
            ?>
                <a href="../index.php" class="btn btn-primary">Home Page </a>
                <a href="logout.php" class="btn btn-danger" style="background-color:red;">Sign Out of Your Account</a>        
            <?php
        }
        else if($_SESSION["user_type"] == "admin"){
            ?>
                <a href="admin.php" class="btn btn-primary">Admin Panel </a>
                <a href="logout.php" class="btn btn-danger" style="background-color:red;">Sign Out of Your Account</a>        
            <?php
        }
        else{
            ?>
                <a href="index.php" class="btn btn-primary">Home Page </a>
                <a href="logout.php" class="btn btn-danger" style="background-color:red;">Sign Out of Your Account</a>        
            <?php           
        }
    ?>
    </p>
  </main>
</body>
</html>
