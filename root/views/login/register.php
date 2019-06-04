
<?php require_once '../../model/Database.php'; 

$dbcon = Database::getDb();

// Define the variables we will use and intialize them to empty strings
$username = $email = $first_name = $last_name = $password = $confirm_password = $image = "";
$username_err = $email_err = $first_name_err = $last_name_err = $password_err = $confirm_password_err = ""; 
$errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // username validation
  if(empty(trim($_POST["username"]))){
    $username_err = "Username is required.";
    array_push($errors, "Username is required.");
  }
  else{
    $sql = "SELECT id FROM users WHERE username = :username";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $param_username = trim($_POST["username"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          $username_err = "This username is already taken.";
          array_push($errors, "This username is already taken.");
        }
        else{
          $username = trim($_POST["username"]);
        }
      }
      else{
        echo "Something went wrong! Please try again later. user error";
      }
    }
    unset($stmt);
	}
	// first name
	if(empty(trim($_POST["first_name"]))){
		$first_name_err = "First Name is Required.";
		array_push($errors, "First Name is Required.");
	}
	else{
		$sql = "SELECT id from users WHERE first_name = :first_name";

		if($stmt = $dbcon->prepare($sql)){
			$stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
			$param_first_name = trim($_POST["first_name"]);

			if($stmt->execute()){
				$first_name = trim($_POST["first_name"]);
			}
			else{
				echo "Something went wrong! Please try again later. user error";
			}
		}
		unset($stmt);
	}

	// last name
	if(empty(trim($_POST["last_name"]))){
		$first_name_err = "Last Name is Required.";
		array_push($errors, "Last Name is Required.");
	}
	else{
		$sql = "SELECT id from users WHERE last_name = :last_name";

		if($stmt = $dbcon->prepare($sql)){
			$stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
			$param_last_name = trim($_POST["last_name"]);

			if($stmt->execute()){
				$last_name = trim($_POST["last_name"]);
			}
			else{
				echo "Something went wrong! Please try again later. user error";
			}
		}
		unset($stmt);
	}

  // email validation
  if(empty(trim($_POST["email"]))){
    $email_err = "Email is required.";
    array_push($errors, "Email is required.");
  }
  else{
    $sql = "SELECT id FROM users WHERE email = :email";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $param_email = trim($_POST["email"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
        $email_err = "This email already exist.";
        array_push($errors, "This email already exist.");
      }
      else{
        $email = trim($_POST["email"]);
      }
    }
    else{
      echo "Something went wrong! Please try again later. user error";
    }
  }
  $folder = "uploads/";
  $image = $_FILES['image']['name'];

  $path = $folder . $image ;
  $target_file = $folder.basename($_FILES["image"]["name"]);

  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $allowed = array('jpeg','png','jpg','JPEG','PNG','JPG');
  $filename = $_FILES['image']['name'];

  $ext=pathinfo($filename, PATHINFO_EXTENSION);
  if(!in_array($ext,$allowed)){
    echo "Please only select image file of type JPG, JPEG, PNG OR GIF";
  }
  else{
    move_uploaded_file( $_FILES['image']['tmp_name'], $path);
  }

  unset($stmt);
}



  //password validation
  if(empty(trim($_POST["password"]))){
    $password_err = "Password is required.";
    array_push($errors, "Password is required.");
    // make sure password length is at least 6 characters
  } elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have at least 6 characters";
    array_push($errors, "Password must have at least 6 characters");
  }  
  else{
    $password = trim($_POST["password"]);
  }

  // validate match password
  if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm your password.";
    array_push($errors, "Please confirm your password.");
  }
  else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password))
    {
      $confirm_password_err = "Password did not match.";
      array_push($errors, "Password does not match.");
    }
  }
  
  // register user if there are no errors in the form
  if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err))
  {
    $sql = "INSERT INTO users (username, email, first_name, last_name,user_type, image, password) VALUES (:username, :email, :first_name, :last_name, :user_type, :image, :password)";
    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
			$stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
			$stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);
      $stmt->bindParam(":user_type", $param_user_type, PDO::PARAM_STR);

      $param_username = $username;
			$param_email = $email;
			$param_first_name = $first_name;
			$param_last_name = $last_name;
      $param_user_type = "user";
      $param_image = $image;
      // This method is to create password hash to encrypt the password when saved in the database
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      if($stmt->execute()){
        session_start();

        // this will make session available in other pages
        $_SESSION["loggedin"] = true;
        // we need to get the id and username since we will need to show the username value in some of the pages.
        $_SESSION["id"] = $id;
				$_SESSION["username"] = $username;
				$_SESSION["first_name"] = $first_name;
				$_SESSION["last_name"] = $last_name;
        $_SESSION["user_type"] = $user_type;
        $_SESSION["email"] = $email;
        $_SESSION["image"] = $image;
      ?>
        <!-- if all requirements are met for registeration, redirect to welcome page -->
        <script type="text/javascript">
        window.location.href = "welcome1.php";
        </script>
      <?php  
      }
      else{
        echo "Something went wrong. Please try again later.";
      }
    }
    // close statement
    unset($stmt);
  }
  // close connection
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
$page_title = "World News";
include dirname( __FILE__) . "../../header.php";
?>

<html>
<head>
	<title>Registration system PHP and MySQL</title>


<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
	<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email Address</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="first_name" value="<?php echo $first_name; ?>">
	</div>
	<div class="input-group">
		<label>Last Name</label>
		<input type="text" name="last_name" value="<?php echo $last_name; ?>">
	</div>		
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password" value = "<?php echo $password; ?>">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="confirm_password"  value = "<?php echo $confirm_password; ?>">
  </div>
	<div style="color: white;">
		<label>Select Your image: </label>
    <input type="file" name="image" accept="image/*" value="<?php echo $image; ?>">
	</div>  
	<div class="input-group d-flex justify-content-center">
		<button type="submit" class="btn w-50" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
<?php include dirname( __FILE__) . "../../footer.php"; ?>
</body>
</html>