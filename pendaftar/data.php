<!doctype html>
<html class="no-js" lang="en">
<?php
include '../dbconnect.php';
include '../cek.php';
if ($role !== 'User') {
  header("location:../login.php");
}
;
$userid = $_SESSION['userid'];

include 'submit.php';


//cek dulu sudah pernah submit belum
$cekdulu = mysqli_query($conn, "select * from userdata where userid='$userid'");
$ambil = mysqli_fetch_array($cekdulu);
$status = $ambil['status'];

//kalau udah pernah verify
if ($status == 'Terdaftar') {
  header("location:terdaftar.php");
} else {

}
;
?>


<head>
  <meta charset="UTF-8">
  <title> Formulir-pendaftar </title>
  <link rel="shortcut icon" href="../img/logo-sekolah.png">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <span class="link_name">Dashboard</span>
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
  <div class="home-section">
    <div class="main-content-inner">
      <div class="row mt-5 mb-5">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="d-sm-flex justify-content-between align-items-center">
                  <h2>Formulir</h2>
                  <p>* Data yang telah diinput tidak dapat diubah kembali, silahkan periksa lagi data anda</p>
                </div>
                <br>
                <div class="form-group col-md-12">
                  <label for="email">Nama Lengkap*</label>
                  <input name="namalengkap" type="text" id="email" class="form-control"
                    placeholder="Masukkan Nama Lengkap" value="<?php echo $ambil['namalengkap'] ?>" autofocus required>
                </div>
                <div class="form-group col-md-6">
                  <label>Jenis Kelamin*</label>
                  <select class="form-select" name="jeniskelamin" required>
                    <option value="<? $ambil['jeniskelamin'] ?>"><?php echo $ambil['jeniskelamin'] ?></option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="agama">Agama*</label>
                  <select class="form-select" name="agama" id="agama" required>
                    <option value="<? $ambil['agama'] ?>"><?php echo $ambil['agama'] ?></option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>

                <div class="form-group col-md-12">
                  <label>Alamat Lengkap*</label>
                  <textarea name="alamat" type="text" class="form-control" rows="3" minlength="10"
                    placeholder="Masukkan Alamat" required><?php echo $ambil['alamat'] ?></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Sekolah Asal*</label>
                  <input name="sekolah" type="text" class="form-control" placeholder="Sekolah Asal"
                    value="<?php echo $ambil['useremail'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Jurusan *</label>
                  <select class="form-select" name="jurusan">
                    <option value="<? $ambil['jurusan'] ?>"><?php echo $ambil['jurusan'] ?></option>
                    <option value="Tkj">Teknik Komputer Jaringan</option>
                    <option value="Farmasi">Farmasi</option>
                    <option value="Akuntansi">Akuntansi</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Tempat Lahir*</label>
                  <input name="tempatlahir" type="text" class="form-control" placeholder="Masukkan Tempat Lahir"
                    value="<?php echo $ambil['tempatlahir'] ?>" required>
                </div>


                <div class="form-group col-md-6">
                  <label>Tanggal Lahir*</label>
                  <input name="tgllahir" type="date" class="form-control" value="<?php echo $ambil['tanggallahir'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>Email*</label>
                  <input name="useremail" type="email" class="form-control" placeholder="Masukkan Email"
                    value="<?php echo $ambil['useremail'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label>No Telepon*</label>
                  <input name="telepon" type="text" class="form-control" maxlength="13"
                    placeholder="Masukkan No telepon" value="<?php echo $ambil['telepon'] ?>" required>
                  <input type="hidden" value="<?= $userid; ?>" name="id">
                </div>




                <div class="modal-footer">
                  <input type="submit" name="update" class="btn btn-primary" value="Simpan">
                  <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#mdl">Konfirmasi</button>
                </div>
              </form>
            </div>

            <div class="modal fade" id="mdl">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="post">

                    <!-- Modal body -->
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda yakin untuk konfirmasi data Anda? Setelah dikonfirmasi, data tidak dapat diubah
                      kembali.
                      <input type="hidden" value="<?= $userid; ?>" name="id">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <input type="submit" class="btn btn-success" name="ok" value="Konfirmasi">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="fixed-bottom">
    <div>
      <p>© kn14</p>
    </div>
  </footer>









  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/f155d3166d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>