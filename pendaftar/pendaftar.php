<!doctype html>
<html class="no-js" lang="en">

<?php
include '../dbconnect.php';
include '../cek.php';
if ($role !== 'User') {
  header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> List-pendaftar </title>
  <link rel="shortcut icon" href="../img/logo-sekolah.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/f155d3166d.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">

      <i class='bx bx-menu'></i>

      <span class="logo_name">SMK 1</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.php">
          <i class="fa-solid fa-house"></i>
          <span class="link_name">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php">Home</a></li>
        </ul>
      </li>
      <li>
        <a href="daftar.php">
          <i class="fa-solid fa-tags"></i>
          <span class="link_name">Formulir</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="daftar.php">Formulir</a></li>
        </ul>
      </li>
      <li>
        <a href="pendaftar.php">
          <i class="fa-solid fa-users"></i>
          <span class="link_name">Pendaftar</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pendaftar.php">Pendaftar</a></li>
        </ul>
      </li>




      <li>
        <a href="../logout.php">
          <i class='bx bx-log-out'></i>
          <span class="link_name">Log out</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../logout.php">Log out</a></li>
        </ul>
      </li>

    </ul>
  </div>
  <div class="home-section" style="height:100vh">
    <div class="main-content-inner">
      <div class="row mt-5 mb-5">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <br>
              <h4>
                <center>DAFTAR PESERTA PPDB</center>
              </h4>
              <?php


              //Cek apakah ada kiriman form dari method post
              if (isset($_GET['userid'])) {
                $userid = htmlspecialchars($_GET["userid"]);

                $sql = "delete from userdata where userid='$userid' ";
                $hasil = mysqli_query($conn, $sql);

                //Kondisi apakah berhasil atau tidak
                if ($hasil) {
                  header("Location:index.php");

                } else {
                  echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

                }
              }
              ?>



              <table id="data" class="table  table-bordered">
                <thead>
                  <tr>
                    <th>No</th>

                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Sekolah</th>
                    <th>Status</th>
                    <th>Tgl Daftar</th>

                  </tr>
                </thead>
                <?php

                $sql = "select * from userdata order by userid desc";

                $hasil = mysqli_query($conn, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                  $no++;

                  ?>
                  <tr>
                    <td>
                      <?php echo $no; ?>
                    </td>

                    <td>
                      <?php echo $data["namalengkap"]; ?>
                    </td>
                    <td>
                      <?php echo $data["jeniskelamin"]; ?>
                    </td>
                    <td>
                      <?php echo $data["jurusan"]; ?>
                    </td>
                    <td>
                      <?php echo $data["sekolah"]; ?>
                    </td>




                    <td>
                      <?php echo $data["status"]; ?>
                    </td>
                    <td>
                      <?php echo $data["tglkonfirmasi"]; ?>
                    </td>

                  </tr>
                <?php } ?>

                </tbody>
              </table>
              <br>*Note: <br>Pihak sekolah baru akan mengakui data Anda jika status 'terdaftar',jika status 'Belum Terdaftar' <br> silahkan pergi ke laman formulir dan klik konfirmasi
            </div>
            <footer class="fixed-bottom">
              <div>
                <p>© kn14</p>
              </div>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#data').DataTable({
        lengthMenu: [
          [5, 25, 50, -1],
          [5, 25, 50, 'All'],
        ],
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>