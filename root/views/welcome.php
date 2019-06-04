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
  <link rel="stylesheet" type="text/css" href="login.css">
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/login.js"></script>
</head>
<body>
<!-- main -->
  <main>  
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="card-title-mb-4">
                <div class="d-flex justify content-start">
                  <div class="image-container">
                    <img src="uploads/<?php echo htmlspecialchars($_SESSION['image']); ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                    <div class="middle">
                      <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                      <input type="file" style="display: none;" id="profilePicture" name="file" />                    
                    </div>
                  </div>
                  <div class="userData ml-3">
                    <div class="d-block" style="font-size: 1.5rem; font-weight:bold;"><a href="javascript:void(0);"><?php echo htmlspecialchars($_SESSION["username"]); ?></a></h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                    </li>
                  </ul>
                  <div class="tab-content ml-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Full Name </label>
                        </div>
                        <div class="col-md-8 col-6">
                        <?php echo htmlspecialchars($_SESSION["first_name"]); ?> <?php echo htmlspecialchars($_SESSION["last_name"]); ?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;"> E-mail </label>
                        </div>
                        <div class="col-md-8 col-6">
                        <?php echo htmlspecialchars($_SESSION["email"]); ?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;"> User Name </label>
                        </div>
                        <div class="col-md-8 col-6">
                        <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </div>
                      </div>
                      <hr />                                            
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
