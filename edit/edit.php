<?php
include '../config/database.php';
$id         = $_GET['id'];
$data        = mysqli_fetch_array($mahasiswa);
// membuat data jurusan menjadi dinamis dalam bentuk array
$jurusan    = array('TEKNIK INFORMATIKA','TEKNIK ELEKTRO','REKAMEDIS');
// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
    // apabilan value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ajax Jquery - Belajarphp.net</title>
    </head>
    <body>
        <form method="post" action="edit.php">
            <input type="hidden" value="<?php echo $data['id'];?>" name="id">
            <table>
                <tr><td>NIM</td><td><input type="text" value="<?php echo $data['nim'];?>" name="nim"></td></tr>
                <tr><td>NAMA</td><td><input type="text" value="<?php echo $data['nama'];?>" name="nama"></td></tr>
                <tr><td>JENIS KELAMIN</td><td>
                        <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $data['jenis_kelamin'])?>>Laki Laki
                        <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $data['jenis_kelamin'])?>>Perempuan
                    </td></tr>
                <tr><td>JURUSAN <?php echo $data['jurusan'];?></td><td>
                        <select name="jurusan">
                            <?php
                            foreach ($jurusan as $j){
                                echo "<option value='$j' ";
                                echo $data['jurusan']==$j?'selected="selected"':'';
                                echo ">$j</option>";
                            }
                            ?>
                        </select>
                    </td></tr>
                <tr><td>ALAMAT</td><td><input value="<?php echo $data['alamat'];?>" type="text" name="alamat"></td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan">SIMPAN PERUBAHAN</button>
                        <a href="index.php">Kembali</a></td></tr>
            </table>
        </form>
    </body>
</html>