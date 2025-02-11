<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home-Pendaftaran</title>
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
  <div class="home-section" style="height:100vh;" >
    <div class="main-content">
      <div class="main-content-inner">
        <div class="row mt-5 mb-5">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                
                  <center><h4>Selamat datang di Penerimaan Peserta Didik Baru (PPDB) Online SMK 1.</h4></center>
                
                <div class="market-status-table mt-4">
                <center><table id="data" class="table  table-bordered" style="width:80%;" >
                  <thead>
                    <h4>Jadwal PPDB</h4>
                    <tr>
                      <th>Kegiatan</th>
                      <th>Tanggal</th>
                      <th>Lokasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Pendaftaran</td>
                      <td>23 S.D 28 Mei 2023</td>
                      <td>Online</td>
                    </tr>
                    <tr>
                      <td>Pendaftaran ulang</td>
                      <td>17 S.D 18 Juni 2023</td>
                      <td>Gedung SMK 1</td>
                    </tr>
                    <tr>
                      <td>Perpanjangan waktu Pendaftaran</td>
                      <td>17 S.D 20 Juni 2023</td>
                      <td>Gedung SMK 1</td>
                    </tr>
                    <tr>
                      <td>Tes Masuk</td>
                      <td>21 juni 2023</td>
                      <td>Online</td>
                    </tr>
                    <tr>
                      <td>Masuk Sekolah</td>
                      <td>1 juli 2023</td>
                      <td>Gedung SMK 1</td>
                    </tr>
                  </tbody>
                </table></center>
                  <div class="table-responsive">
                    <br>
                    <p>
                      Panduan Pendaftaran :
                      <br>1. Pada bagian menu, klik 'Formulir'untuk mengisi formulir pendaftaran.
                      <br>2. Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data
                      yang salah.
                      <br>3. Klik simpan, kemudian klik konfirmasi. Setelah di-konfirmasi, data tidak dapat diubah kembali.
                      <br>4. Jika data salah silahkan hubungi admin <a href="#">di sini</a>
                      <br>
                      <br>*Note: <br>Pihak sekolah baru akan mengakui data Anda jika status 'terdaftar',jika status 'Belum Terdaftar' <br> silahkan pergi ke laman formulir dan klik konfirmasi
                    </p>
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

  </div>



  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/f155d3166d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>