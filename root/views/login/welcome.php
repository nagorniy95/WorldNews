<?php
session_start();
// it will redirect to login page if we dont have the login or register information in a session.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");

    print_r($_SESSION);
    exit;
}
$page_title = "WorldNews";
include '../header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<!-- main -->
  <main id="welcome">  
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card ">
            <div class="card-body">
              <div class="card-title-mb-10">
                <div class="d-flex justify content-start">
                  <div class="image-container col-sm-12 col-md-12 col-12">
                    <img class="rounded-circle" src="uploads/<?php echo htmlspecialchars($_SESSION['image']); ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                    <div class="middle">
                      <!-- This part of changing the image and uploaed it to the database which runs upload.php is taken from
                           https://stackoverflow.com/questions/48237149/changing-profile-picture-php
                      -->
                      <form id="form2" action="upload.php" method="post" enctype="multipart/form-data">
                        <p id="p1">Change profile picture:
                        <input type="file" name="fileToUpload" id="fileToUpload"><br />
                        </p>
                        <br><input id="sub1" type="submit" value="Change profile picture" name="change"><br />
                      </form>                    
                    </div>
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
                          <label style="font-weight:bold;">First Name </label>
                        </div>
                        <div class="col-md-8 col-6">
                        <?php echo htmlspecialchars($_SESSION["first_name"]); ?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Last Name </label>
                        </div>
                        <div class="col-md-8 col-6">
                        <?php echo htmlspecialchars($_SESSION["last_name"]); ?>
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
    <div class="text-center m-2">  
      <p> 
      <?php
      // if user type is user then it will show Home page button that will redirect to index.php
      // else user type will be admin then it will have admin panel button that will redirect to admin.php
          if($_SESSION["user_type"] == "user"){
              ?>
                  <a href="../index.php" class="btn btn-primary">Home Page </a>
                  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>        
              <?php
          }
          else if($_SESSION["user_type"] == "admin"){
              ?>
                  <a href="../admin-dashboard.php" class="btn btn-primary">Admin Dashboard </a>
                  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>        
              <?php
          }
          else{
              ?>
                  <a href="index.php" class="btn btn-primary">Home Page </a>
                  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>        
              <?php           
          }
      ?>
      </p>
    </div>
  </main>
  <?php include '../footer.php'; ?>
</body>
</html>
