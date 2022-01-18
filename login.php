<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

		<title>Sistem Infromasi Perpustakaan</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 offset-lg-4 mt-5">
					<h3 class="mb-3">Admin Perpustakaan</h3>
					<div class="jumbotron">
						<h1 class="display-4">Login</h1>
						<form action="login-check.php" method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control">
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>

							<div class="form-group">
								<button type="submit" name="submit" value="1" class="btn btn-lg btn-primary"><i class="fa fa-lock"></i> Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Optional JavaScript; choose one of the two! -->
		<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
	</body>
</html>