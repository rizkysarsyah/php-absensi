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
    
<?php 
if (isset($_GET['delete'])) {
    $id  = $_GET['delete'];
    $querydelete = mysqli_query($mysqli, "DELETE FROM pegawai WHERE id='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

    if ($querydelete) {
        echo "<div class='alert alert-info alert-dismissable'>
        <button type='button' class='close' data-dismis='alert' aria-hidden='true'>&times;</button>
        <h4> <i class='icon fa fa-check-circle'></i> Delete Berhasil $file! </h4>
        Data tersimpan.
        </div>";
    }
    elseif (isset($_GET['edit'])) {
        $id     =$_POST['id'];
        $query = mysqli_query($mysqli, "UPDATE pegawai where id ='$id'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) {
            echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4> <id class='icon fa fa-check-circle'></i> Edit Berhasil ! </h4>
            Data tersimpan.
            </div>";
        }
    }
}
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <a class="btn btn-info" href="index.php?page=tambah_pegawai"> Tambah Pegawai</a>
    <a class="btn btn-primary" href="index.php?page=admin">Data Absensi Pegawai</a>
    <form action="#" method="POST">
        <br>
        <br>
        <div class="card">
            <h5 class="card-header">Basic Table</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>

                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $id = $_SESSION['id'];
                            $no = 1;
                            $query = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE id ORDER BY id DESC") or die('Ada kesalahabsenan query tampil data portofolio:'.mysqli_error($mysqli));
                            while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><?php echo $data['level']; ?></td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger" href="index.php?page=data_pegawai&delete=<?php echo $data['id']; ?>" onclick="return confirm('apakah anda yakin untuk delete <?php echo $data['id']; ?> ?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a class="btn btn-warning"  href="index.php?page=edit&edit=<?php echo $data['id'];  ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="top" title="lihat" class="btn btn-default" href="index.php?page=see&edit=<?php echo $data['id'];  ?>" onclick="return confirm('Apakah anda yakin untuk edit ? <?php echo $data['id']; ?> ?');">
                                            <i class="fas fa-info-circle"></i>
                                            </a
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>


                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>