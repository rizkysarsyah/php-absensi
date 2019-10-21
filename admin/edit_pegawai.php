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
<!-- DataTables Example -->
<a class="btn btn-info" href="index.php?page=data_pegawai"> Data Pegawai</a> 
<br>
<br>
<div class="card">
  <h5 class="card-header">Basic Table</h5>
  <div class="card-body">
    <?php 
    if (isset($_POST['edit_simpan'])) {
      $id     =$_POST['id'];
      $nama  =$_POST['nama'];
      $username    =$_POST['username'];

      $query = mysqli_query($mysqli, "UPDATE pegawai set nama='$nama', username='$username' where id='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

      if ($query) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4> <i class='icon fa fa-check-circle'></i> Edit Berhasil ! </h4>
        Data tersimpan.
        </div>";
      }
    }
    ?>
    <?php 
    if (isset($_GET['edit'])) {
      $id = $_GET['edit'];

      $query = mysqli_query($mysqli,"SELECT * FROM pegawai where id = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
      while($data = mysqli_fetch_assoc($query)){
        ?>

        <form action="#" method="POST">
          <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <label for="validationCustom01">Nama</label>
              <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
              <input type="text" class="form-control" id="validationCustom01" placeholder="Nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <label for="validationCustom01">Username</label>
              <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
              <input type="text" class="form-control" id="validationCustom01" placeholder="Nama" name="username" value="<?php echo $data['username']; ?>" required>
              <br>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-1">
                <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
              </div>
            </div>
          </div>
        </form>
      <?php }
    } 
    ?>
  </div>
</div>