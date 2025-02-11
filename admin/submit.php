<?php
//untuk update
if (isset($_POST['update'])) {
  $useremail = $_POST['useremail'];
  $namalengkap = $_POST['namalengkap'];
  $jurusan = $_POST['jurusan'];
  $sekolah = $_POST['sekolah'];
  $alamat = $_POST['alamat'];
  $jeniskelamin = $_POST['jeniskelamin'];
  $agama = $_POST['agama'];
  $tempatlahir = $_POST['tempatlahir'];
  $tanggallahir = $_POST['tanggallahir'];
  $userid = $_POST['userid'];
  $telepon = $_POST['telepon'];


  $update = mysqli_query($conn, "update userdata set useremail='$useremail',
			namalengkap='$namalengkap',
			jeniskelamin='$jeniskelamin',
			jurusan='$jurusan',
			sekolah='$sekolah',
            tempatlahir='$tempatlahir',
            tanggallahir='$tanggallahir',
            alamat='$alamat',
            agama='$agama',
            telepon='$telepon'
			where userid=$userid");
  //Mengeksekusi/menjalankan query diatas
  if ($update) {

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    echo " <div class='alert alert-success'>
        Berhasil untuk berhasil update data.
    </div>
    <meta http-equiv='refresh' content='1; url= index.php'/>  ";

  } else {

    echo "<div class='alert alert-warning'>
        Gagal submit data. Silakan coba lagi nanti.
    </div>
    <meta http-equiv='refresh' content='3; url= index.php'/> ";

  }
}
;
//untuk delete
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
;

//untuk tanggal konfirmasi
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");

//kalau konfirmasi
if (isset($_POST['ok'])) {
  $id = $_POST['id'];
  $updateaja = mysqli_query($conn, "update userdata set status='Verified', tglkonfirmasi='$today' where userid='$id'");

  if ($updateaja) {
    //berhasil bikin
    echo " <div class='alert alert-success'>
                  Berhasil submit data.
              </div>
              <meta http-equiv='refresh' content='1; url= data.php'/>  ";
  } else {
    echo "<div class='alert alert-warning'>
                      Gagal submit data. Silakan coba lagi nanti.
                  </div>
                  <meta http-equiv='refresh' content='3; url= data.php'/> ";
  }
}
;

?>