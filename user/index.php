 <?php session_start();
    if(!isset($_SESSION['nama']))
    {
        header("location: ../login.php?alert=3");
    }
    ?>

        <p>Halo <b><?php echo $_SESSION['nama']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <?php 
        if (isset($_POST['hadir'])) {
            $nama = $_SESSION['nama'];
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date("Y-m-d");
            $jam = date("h:i");
            $id_author = $_SESSION['id'];

            $query = mysqli_query($mysqli, "INSERT INTO absen (nama,tanggal,jam_masuk,id_author)VALUES('$nama','$tanggal','$jam','$id_author')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

            if ($query) {
                echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4> <i class='icon fa fa-check-circle'></i> Proses Berhasil ! </h4>
                Data tersimpan.
                </div>";
            }
        }
        elseif (isset($_POST['pulang'])) {
            date_default_timezone_set('Asia/Jakarta');
            $id     =$_POST['id'];
            $pulang = date("h:i");
            $tanggal = date("Y-m-d");
            $query = mysqli_query($mysqli, "UPDATE absen SET jam_pulang = '$pulang' where tanggal ='$tanggal'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

            if ($query) {
                echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4> <i class='icon fa fa-check-circle'></i> Edit Berhasil ! </h4>
                Data tersimpan.
                </div>";
            }
        }
        ?>
        <form action="#" method="POST">
            <button class="btn btn-primary" type="submit" name="hadir" >Hadir</button>    
            <button class="btn btn-success" type="submit" name="pulang" index.php?page=index.php?page=pegawai=<?php echo $data['id'];  ?>>Pulang</button>
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
                                    <th>Jam datang</th>
                                    <th>Jam pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $id = $_SESSION['id'];
                                $no = 1;
                                $query = mysqli_query($mysqli, "SELECT * FROM absen WHERE id_author = $id ORDER BY id DESC") or die('Ada kesalahabsenan query tampil data portofolio:'.mysqli_error($mysqli));
                                while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td><?php echo $data['jam_masuk']; ?></td>
                                        <td><?php echo $data['jam_pulang']; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam datang</th>
                                    <th>Jam pulang</th>
                                </tr>


                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>