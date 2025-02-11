<!doctype html>
<html class="no-js" lang="en">

<?php
include '../dbconnect.php';
include '../cek.php';
include 'submit.php';
if ($role !== 'Admin') {
  header("location:../login.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Home-admin </title>
  <link rel="shortcut icon" href="../img/logo-sekolah.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Boxiocns CDN Link -->
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
              <br>
              <h4>
                <center>DAFTAR PESERTA PPDB</center>
              </h4>
              <table id="data" class="table  table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Sekolah</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>No Hp</th>
                    <th>Status</th>
                    <th>Tgl Daftar</th>
                    <th >Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $hasil = mysqli_query($conn, "select * from userdata order by userid desc");
                  $no = 0;
                  while ($data = mysqli_fetch_array($hasil)) {
                    $no++;

                    ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $data["useremail"]; ?>
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
                        <?php echo $data["tempatlahir"]; ?><br>
                        <?php echo $data["tanggallahir"]; ?>
                      </td>
                      <td>
                        <?php echo $data["alamat"]; ?>
                      </td>
                      <td>
                        <?php echo $data["agama"]; ?>
                      </td>
                      <td>
                        <?php echo $data["telepon"]; ?>
                      </td>
                      <td>
                        <?php echo $data["status"]; ?>
                      </td>
                      <td>
                        <?php echo $data["tglkonfirmasi"]; ?>
                      </td>
                      <td>

                        <button type="button" class="btn btn-danger">
                          <a
                            href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?userid=<?php echo $data['userid']; ?>"><i
                              class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                        </button>
                        <br>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                          data-bs-target="#exampleModal<?= $data['userid']; ?>">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $data['userid']; ?>" tabindex="-1"
                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                  <input type="hidden" name="userid" value="<?= $data['userid'] ?>" />

                                  <div class="mb-3 ">
                                    <label class="form-label" for="email">Email</label>
                                    <input name="useremail" type="email" class="form-control" maxlength="50"
                                      value="<?php echo $data['useremail'] ?>" required>
                                  </div>

                                  <div class="mb-3 ">
                                    <label class="form-label" for="nama">Nama Lengkap</label>
                                    <input name="namalengkap" type="text" class="form-control" maxlength="50"
                                      value="<?php echo $data['namalengkap'] ?>" required>
                                  </div>

                                  <div class="mb-3 ">
                                    <label>Jenis Kelamin*</label>
                                    <select class="form-select" name="jeniskelamin">
                                      <option>
                                        <?php echo $data['jeniskelamin'] ?>
                                      </option>
                                      <option value="L">Laki-laki</option>
                                      <option value="P">Perempuan</option>
                                    </select>
                                  </div>

                                  <div class="mb-3 ">
                                    <label>Jurusan*</label>
                                    <select class="form-select" name="jurusan">
                                      <option>
                                        <?php echo $data['jurusan'] ?>
                                      </option>
                                      <option value="Tkj">Teknik Komputer Jaringan</option>
                                      <option value="Farmasi">Farmasi</option>
                                      <option value="Akuntansi">Akuntansi</option>
                                    </select>
                                  </div>

                                  <div class="mb-3 ">
                                    <label class="form-label" for="sekolah">Sekolah</label>
                                    <input name="sekolah" type="text" class="form-control" maxlength="20"
                                      value="<?php echo $data['sekolah'] ?>" required>
                                  </div>

                                  <div class="mb-3 ">
                                    <label class="form-label" for="Tempatlahir">Tempat Lahir</label>
                                    <input name="tempatlahir" type="text" class="form-control" maxlength="20"
                                      value="<?php echo $data['tempatlahir'] ?>" required>
                                  </div>

                                  <div class="mb-3 ">
                                    <label class="form-label" for="Tanggallahir">Tanggal Lahir</label>
                                    <input name="tanggallahir" type="date" class="form-control"
                                      value="<?php echo $data['tanggallahir'] ?>" required>
                                  </div>

                                  <div class="mb-3 ">
                                    <label class="form-label" for="alamat">Alamat Lengkap</label>
                                    <input name="alamat" type="text" class="form-control" placeholder="Alamat"
                                      value="<?php echo $data['alamat'] ?>" required>
                                    <div class="mb-3 ">
                                      <label>Agama</label>
                                      <select class="form-select" name="agama">
                                        <option>
                                          <?php echo $data['agama'] ?>
                                        </option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                      </select>
                                    </div>

                                    <div class="mb-3 ">
                                      <label class="form-label" for="telepon">No Telepon</label>
                                      <input name="telepon" type="text" class="form-control" maxlength="15"
                                        value="<?php echo $data['telepon'] ?>">

                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

                                      <button type="submit" class="btn btn-primary" name="update">Save changes</button>

                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#data').DataTable({
          lengthMenu: [
            [3, 25, 50, -1],
            [3, 25, 50, 'All'],
          ],
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>

</body>

</html>