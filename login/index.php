<?php
session_start();

if (isset($_SESSION['ingatkan'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Apotek</title>

    <!-- BOOTSTRAP 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- ADD CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <?php
                if (isset($_GET['pesan'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_GET['pesan'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }
                ?>
                <?php
                if (isset($_GET['aktivasi'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_GET['aktivasi'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }
                ?>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <div class="box">
        <form autocomplete="off" action="aksilogin.php" method="POST">

            <h2>SIGN IN</h2>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div>
                <input type="checkbox" class="form-check-input" id="ingatkan" name="ingatkan">
                <label class="form-check-label" for="ingatkan" style="color:white;">Ingat Saya</label>
            </div>
            <div class="links">
                <a href="#">Forgot Password ?</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>