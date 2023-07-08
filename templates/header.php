<?php
// session_start();
// $name = $_SESSION['name'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOIL LAB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="stylesheets/styles.css"> -->
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            font-family: 'Kanit', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

        nav {
            background-color: #0db24c;
            border-bottom: 2px solid #0db24c;
        }

        .navbar-brand {
            color: #0db24c !important;
            font-size: 2.5rem !important;
            font-family: 'Kanit', sans-serif;
        }

        .navbar-brand span:hover {
            color: #0db24c;
        }
    </style>
</head>

<body>
    <!-- ! !ADD ADDITIONAL CSS -->
    <nav id="mainNavbar" class="navbar navbar-dark bg-dark bg-gradient navbar-expand-md sticky-top border-bottom border-success">
        <div class="container-fluid px-5"><a class="navbar-brand px-lg-3" href="index.php">SOIL HEALTH</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    ?>
                        <a class="nav-link fs-5" href="farmer_dashboard.php"><i class="bi bi-person-circle"></i> Profile</a>
                        <a class="nav-link fs-5" href="logout.php">Logout</a>
                    <?php } else { ?>
                        <a class="nav-link fs-5" href="login.php">Login</a>
                        <a class="nav-link fs-5" href="register.php">Register</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>