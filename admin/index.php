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
    <p>Halo <b><?php echo $_SESSION['nama']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <form action="#" method="POST">
            <a class="btn btn-info" href="index.php?page=tambah_pegawai"> Tambah Pegawai</a>
            <a class="btn btn-primary" href="index.php?page=data_pegawai">Data Pegawai</a>
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
                                    <th>Tanggal</th>
                                    <th>Jam Datang</th>
                                    <th>Jam Pulang</th>
                                    <th>total jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $id = $_SESSION['id'];
                                $no = 1;
                                $query = mysqli_query($mysqli, "SELECT * FROM absen WHERE id ORDER BY id DESC") or die('Ada kesalahabsenan query tampil data portofolio:'.mysqli_error($mysqli));
                                while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td><?php echo $data['jam_masuk']; ?></td>
                                        <td><?php echo $data['jam_pulang']; ?></td>
                                        <td><?php echo $data['jam_pulang'] - $data['jam_masuk']; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Datang</th>
                                    <th>Jam Pulang</th>
                                    <th>total jam</th>
                                </tr>


                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>