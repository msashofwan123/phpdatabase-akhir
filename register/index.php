<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Register Apotek</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/30f09fe5e7.js" crossorigin="anonymous"></script>

	<!-- FAVICON -->
	<link rel="shortcut icon" href="../assets/favicon.ico">

	<!-- BOOTSTRAP 5.3.0 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<!-- <img src="img/bg.svg"> -->
		</div>
		<div class="login-content">
			<form action="aksiregister.php" method="POST">

				<?php
				if (isset($_GET['success'])) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $_GET['success'] ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php }
				?>

				<?php
				if (isset($_GET['alert'])) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $_GET['alert'] ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php }
				?>

				<img src="img/avatar.svg">
				<h2 class="title">REGISTER</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" name="username" class="input" autocomplete="off">
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fa-regular fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="text" name="email" class="input" autocomplete="off">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" name="password" class="input" autocomplete="off">
					</div>
				</div>
				<a href="../login" id="a">Login Now</a>
				<input type="submit" id="btn" value="REGISTER">
			</form>
		</div>
	</div>

	<script type="text/javascript">
		const inputs = document.querySelectorAll(".input");


		function addcl() {
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl() {
			let parent = this.parentNode.parentNode;
			if (this.value == "") {
				parent.classList.remove("focus");
			}
		}


		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});
	</script>
	<!-- BOOTSTRAP JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>