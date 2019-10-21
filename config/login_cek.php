<?php
// panggil file untuk koneksi ke database
require_once "database.php";

// ambil data hasil submit dari form
$username = $_POST['username'];
$password = $_POST['password'];

	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
$query = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE username='$username' AND password='$password'")
or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
if ($rows > 0) {
	$data  = mysqli_fetch_assoc($query);

	session_start();

	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../index.php?page=admin");

	// cek jika user login sebagai pegawai
	}

	else if($data['level']=="pegawai"){
		// buat session login dan username
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pegawai";
		// alihkan ke halaman dashboard pegawai
		header("location:../index.php?page=pegawai");

	// cek jika user login sebagai pengurus
	}

}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
else {
	header("Location: ../login.php?alert=1");
}

?>