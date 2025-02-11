<?php
session_start();
include 'dbconnect.php';
$alert = '';

if (isset($_SESSION['role'])) {
	$role = $_SESSION['role'];

	if ($role == 'Admin') {
		header("location:admin");
	} else {
		header("location:pendaftar");
	}

}


if (isset($_POST['btn-login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// menyeleksi data user dengan username dan password yang sesuai
	$cariadmin = mysqli_query($conn, "select * from admin where adminemail='$email' and adminpassword='$password';");
	$cariuser = mysqli_query($conn, "select * from user where useremail='$email' and userpassword='$password';");

	// menghitung jumlah data yang ditemukan
	$cekadmin = mysqli_num_rows($cariadmin);
	$cekuser = mysqli_num_rows($cariuser);

	// cek apakah username dan password di temukan pada database
	if ($cekadmin > 0) {

		//jika admin
		$data = mysqli_fetch_assoc($cariadmin);

		// buat session login dan username
		$_SESSION['email'] = $data['adminemail'];
		$_SESSION['role'] = "Admin";
		header("location:admin");
	} else if ($cekuser > 0) {
		//jika user biasa
		$data = mysqli_fetch_assoc($cariuser);

		// buat session login dan username
		$_SESSION['email'] = $data['useremail'];
		$_SESSION['userid'] = $data['userid'];
		$_SESSION['role'] = "User";
		header("location:pendaftar");
	} else {
		//jika user tidak ditemukan
		echo "<div class='alert alert-warning'>Username atau Password salah</div>
    <meta http-equiv='refresh' content='2'>";
	}

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Masuk</title>
	<link rel="shortcut icon" href="img/logo-sekolah.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
	<link rel="stylesheet" href="stylelogin.css">
</head>

<body>
	<div class="container">
		<h1>Login</h1>

		<form method="post">
			<label>Email</label><br>
			<input type="email" class="form-control" placeholder="Masukkan Email" name="email" required><br>
			<label>Password</label><br>
			<input type="password" class="input form-control" placeholder="Password" name="password" id="password" required>
			<div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"> Show Password</i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"> Hide Password</i>
                                    </span>
                                </div><br>
			<button type="submit" class="btn btn-primary" name="btn-login">Masuk</button>
			<p> Belum punya akun?
				<a href="register.php">Daftar</a>
			</p>
		</form>
	</div>


	<script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>



</body>

</html>