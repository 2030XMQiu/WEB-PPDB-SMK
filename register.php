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
;

if (isset($_POST['btn-daftar'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  //cek apakah email sudah pernah digunakan
  $lihat1 = mysqli_query($conn, "select * from user where useremail='$email'");
  $lihat2 = mysqli_num_rows($lihat1);

  if ($lihat2 < 1) {
    //email belum pernah digunakan
    $insert = mysqli_query($conn, "insert into user (username,useremail,userpassword) values ('$name','$email','$password')");

    //eksekusi query
    if ($insert) {
      echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= login.php'/>  ";
    } else {
      //daftar gagal
      echo "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>
            <meta http-equiv='refresh' content='2'>";
    }

  } else {
    //jika email sudah pernah digunakan
    $alert = '<strong><font color="red">Email sudah pernah digunakan</font></strong>';
    echo '<meta http-equiv="refresh" content="2">';
  }

}
;



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar</title>
  <link rel="shortcut icon" href="img/logo-sekolah.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <link rel="stylesheet" href="stylelogin.css">
  <script src="jquery.min.js"></script>
</head>

<body>

  <div class="container">
    <h1>Register</h1>
    <form method="post">
      <label>Username</label>
      <br>
      <input type="text" class="form-control" placeholder="username" name="name" autofocus required>
      <br>
      <label>Email</label>
      <br>
      <input type="email" class="form-control" placeholder="Email" name="email" required>
      <br>
      <label>Password</label>
      <br>
      <input type="password" class="form-control" placeholder="Password" name="password" id="password" autofocus required>
      <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"> Show Password</i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"> Hide Password</i>
                                    </span>
                                </div>
<br>
      <button id="daf" type="submit" class="btn btn-primary" name="btn-daftar">Daftar</button>

      <p> Sudah punya akun?
        <a href="login.php">Login</a>
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