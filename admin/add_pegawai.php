    <?php 
    session_start();
    if(!isset($_SESSION['nama']))
    {
        header("location: ../login.php?alert=3");
    }


    else{
    // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['level']=="pegawai"){
            echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini!"); document.location="../absensi/index.php?page=pegawai";</script>';
        }
    }
    ?>
    <?php include '../config/database.php'; ?>
    <?php
// Baca lokasi file sementar dan nama file dari form (fupload)

    if (isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = sha1(md5($mysqli, ($_POST['password'])));
        $level = $_POST['level'];

        $query = mysqli_query($mysqli, "INSERT INTO pegawai (nama, username, password, level)VALUES('$nama', '$username', '$password', '$level')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) {
          echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4> <i class='icon fa fa-check-circle'></i> Proses Berhasil ! </h4>
          Data tersimpan.
          </div>";
      }
  }
  ?>
  <a class="btn btn-primary" href="index.php?page=data_pegawai">Data Pegawai</a>
  <br>
  <br>
  <form enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
             <h5 class="card-header">Tambah Data Absensi Pegawai</h5>
             <div class="card-body">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Nama" name="nama" required>
                        <div class="invalid-feedback">
                            Silahkan isi nama disini..
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustomUsername">Username</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"aria-describedby="inputGroupPrepend" required name="username">
                            <div class="invalid-feedback">
                                Silahkan isi username disini..
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Password</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="password" name="password" required>
                        <div class="invalid-feedback">
                            Silahkan password nama disini..
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Level</label>
                        <select name="level" class="form-control" required >
                            <option value="0">-=pilih level=-</option>
                            <option value="admin">Admin</option>
                            <option value="pegawai">Pegawai</option>
                        </select>
                    </div>

                </div>
                <br>
                <div class="form-row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit" name="add">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>