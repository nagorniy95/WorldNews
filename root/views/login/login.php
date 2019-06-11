<?php require_once '../../model/Database.php'; 

$dbcon = Database::getDb();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  ?>
  <script type="text/javascript">
  window.location.href = "welcome.php";
  </script>  
<?php
    exit;
}


$username = $password = "";
$username_err = $password_err = "";
$errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
    array_push($errors,"Please enter username.");
  }
  else{
    $username = trim($_POST["username"]);
  }

  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
    array_push($errors,"Please enter your password.");
  }
  else{
    $password = trim($_POST["password"]);
  }

  if(empty($username_err) && empty($password_err)){
    $sql = "SELECT id, first_name, last_name, username, user_type, image, email, password FROM users WHERE username = :username";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

      $param_username = trim($_POST["username"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          if($row = $stmt->fetch()){
            $id= $row["id"];
            $username = $row["username"];
            $user_type = $row["user_type"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $email = $row["email"];
            $image = $row["image"];
            $hashed_password = $row["password"];

            if(password_verify($password, $hashed_password)){
            // password is correct, then start new session

              session_start();

              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["first_name"] = $first_name;
              $_SESSION["last_name"] = $last_name;
              $_SESSION["username"] = $username;
              $_SESSION["user_type"] = $user_type;
              $_SESSION["image"] = $image;
              $_SESSION["email"] = $email;

              ?>  
              <script type="text/javascript">
              window.location.href = 'welcome.php';
              </script>
              <?php
            }
            else{
              $password_err="The password you entered is not valid.";
              array_push($errors,"The password you entered is not valid.");
            }
          }
        }
        else{
          $username_err = "No account found with that username.";
          array_push($errors,"No account found with that username.");
        }
      }
      else {
        echo "Something went wrong. Please try again later.";
      }
    }
    unset($stmt);
  }
  unset($dbcon);
}
// this function to display erros in the register panel.
function display_error() {
  global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
  }
}
// ================================== HEADER ===========================
$page_title = "WorldNews";
include "../header.php";
?>
<!-- ================================ MAIN CONTENT AREA ============================= -->
<body>
  <main class="login">
    <form method="post" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <h2 class="header uppercase red">Login Page</h2>
      <h5>Please fill in your credentials to login</h5>
      <?php echo display_error(); ?>

      <div class="input-group">
        <input type="text" name="username" placeholder="Username:" value="<?php echo $username; ?>">
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password:">
      </div>
      <div class="input-group d-flex justify-content-center">
        <button type="submit" class="btn w-50" name="login_btn">Login</button>
      </div>
      <p>
        Don't have an account? <a href="register.php" class="red bold">Sign up now</a>
      </p>
    </form>
</main>  
<!-- ================================ FOOTER =======================================-->
<?php include "../footer.php"; ?>  
</body>
</html>