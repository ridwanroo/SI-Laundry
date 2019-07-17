<?php 
// menghubungkan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

// update data
mysqli_query($koneksi,"update pelanggan set pelanggan_nama='$nama', pelanggan_hp='$hp', pelanggan_email='$email', pelanggan_alamat='$alamat' where pelanggan_id='$id'");

// mengalihkan halaman kembali ke halaman pelanggan
header("location:pelanggan.php");

?>