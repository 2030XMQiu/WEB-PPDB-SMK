<?php
//untuk insert data
if (isset($_POST['submit'])) {
  $useremail = $_POST['useremail'];
  $namalengkap = $_POST['namalengkap'];
  $jurusan = $_POST['jurusan'];
  $sekolah = $_POST['sekolah'];
  $alamat = $_POST['alamat'];
  $kelamin = $_POST['jeniskelamin'];
  $agama = $_POST['agama'];
  $tempatlahir = $_POST['tempatlahir'];
  $tgllahir = $_POST['tgllahir'];
  $userid = $_POST['id'];
  $telepon = $_POST['telepon'];


  $submitdata = mysqli_query($conn, "insert into userdata (userid,useremail, namalengkap, jeniskelamin, jurusan,sekolah,tempatlahir, tanggallahir, alamat,agama,telepon) values
		    ('$userid','$useremail','$namalengkap','$kelamin','$jurusan','$sekolah','$tempatlahir','$tgllahir','$alamat','$agama','$telepon')");

  //Mengeksekusi/menjalankan query diatas
  if ($submitdata) {

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    echo " <div class='alert alert-success'>
        Berhasil submit data.
    </div>
    <meta http-equiv='refresh' content='2; url= daftar.php'/>  ";

  } else {

    echo "<div class='alert alert-warning'>
        Gagal submit data. Silakan coba lagi nanti.
    </div>
    <meta http-equiv='refresh' content='3; url= daftar.php'/> ";

  }

}
;
//untuk update data
if (isset($_POST['update'])) {
  $useremail = $_POST['useremail'];
  $namalengkap = $_POST['namalengkap'];
  $jurusan = $_POST['jurusan'];
  $sekolah = $_POST['sekolah'];
  $alamat = $_POST['alamat'];
  $kelamin = $_POST['jeniskelamin'];
  $agama = $_POST['agama'];
  $tempatlahir = $_POST['tempatlahir'];
  $tgllahir = $_POST['tgllahir'];
  $userid = $_POST['id'];
  $telepon = $_POST['telepon'];


  $update = mysqli_query($conn, "update userdata set useremail='$useremail',
			namalengkap='$namalengkap',
			jeniskelamin='$kelamin',
			jurusan='$jurusan',
			sekolah='$sekolah',
            tempatlahir='$tempatlahir',
            tanggallahir='$tgllahir',
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
    <meta http-equiv='refresh' content='1; url= daftar.php'/>  ";

  } else {

    echo "<div class='alert alert-warning'>
        Gagal submit data. Silakan coba lagi nanti.
    </div>
    <meta http-equiv='refresh' content='3; url= daftar.php'/> ";

  }
}
;


date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

//kalau konfirmasi
if (isset($_POST['ok'])) {
  $id = $_POST['id'];
  $updateaja = mysqli_query($conn, "update userdata set status='Terdaftar', tglkonfirmasi='$today' where userid='$id'");

  if ($updateaja) {
    //berhasil bikin
    "<div class='alert alert-success'>
        Berhasil untuk berhasil update data.
    </div>
    <meta http-equiv='refresh' content='2; url= data.php'/>  ";
  } else {
    echo "<div class='alert alert-warning'>
                      Gagal submit data. Silakan coba lagi nanti.
                  </div>
                  <meta http-equiv='refresh' content='3; url= data.php'/> ";
  }
}
;

?>