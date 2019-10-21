<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP MYSQL - Belajarphp.net</title>
    </head>
    <body>
        <h2>List Mahasiswa</h2>
        <table border="1">
            <tr><th>NO</th><th>NIM</th><th>NAMA</th><th>GENDER</th><th>JURUSAN</th><th>ACTION</th></tr>
            <?php
            include '../config/database.php';
            $mahasiswa = mysqli_query($mysqli, "SELECT * from pegawai");
            $id = $_POST['id'];
            $no = 1;
            foreach ($mahasiswa as $data) {
            	?>
                <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['username'] ?></td>
            <td><?php echo $data['password'] ?></td>
            <td><a href='edit.php?id_mahasiswa=<?php echo $data['id']?>'>Edit</a>
                        </td>
              </tr>
              <?php                $no++;
            }
            ?>
        </table>

    </body>
</html>