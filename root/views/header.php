<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <!-- jQuery -->
    <script src="../../libs/jquery/jquery.min.js"></script>
    <script src="../../libs/jquery/jquery-3.3.1.min.js"></script>
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" href="../../libs/fontawesome/css/all.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap Toggle Bar Hamburger -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- OWL carousel for index page -->
    <link rel="stylesheet" href="../../libs/owlcarousel/owl.carousel.min.css">
    <script src="../../libs/owlcarousel/owl.carousel.min.js"></script>
    <!-- Fullpage for sport news page -->
    <script src="../../libs/fullpage/jquery.fullpage.min.js"></script>
    <!-- MAIN styles -->
    <link rel="stylesheet" href="../../css/style.css" >

</head>

<body>
    <header id="header-top">
        <div class="container">
            <?php if(isset($_SESSION["loggedin"])): ?>
                <a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a>
            <?php else: ?>
            <a href="../views/login.php"><i class="fa fa-user"></i> Login/</a>
            <a href="../views/register.php"><i class="fa fa-user-plus"></i> Sign up</a>
            <?php endif; ?>
        </div>
    </header>
    <header id="header">
        <nav class="navbar navbar-light navbar-expand-lg static-top">
            <div class="container">
                <a class="navbar-brand" href="../views/index.php">
                    <img src="../../img/logo.png" alt="WorldNews" class="header-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link uppercase" href="../views/index.php">Home
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link uppercase" href="../views/Sport">Sport</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link uppercase" href="#">Technology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link uppercase" href="../views/Crypto/crypto.php">Crypto Currency</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link uppercase" href="../views/finance_news/finance_news.php">Finance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link uppercase" href="#">About Us</a>
                        </li>
                        <li class="nav-item uppercase">
                            <a class="nav-link" href="../views/Contact/contact_pub.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>