<?php 

$ambil = $koneksi->query("SELECT * FROM tbl_pelanggan WHERE no_ktp='$_GET[no_ktp]'");
$data = $ambil->fetch_assoc();

?>

<?php 

$koneksi->query("DELETE FROM tbl_pelanggan WHERE no_ktp='$_GET[no_ktp]'");

echo "<script>alert('Data Pelanggan Terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>

