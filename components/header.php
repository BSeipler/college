<?php include '../utils/check_session.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">University</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <?php if (!$_SESSION) { ?>
            <li class="nav-item">
                <a class="nav-link" href="../login/">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../registration/">Register</a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="../dashboard/">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../enrollment/">Course Registration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Your Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../billing/">Billing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../utils/logout.php">Logout</a>
            </li>
        <?php } ?>
        </ul>
    </div>
    </nav> 