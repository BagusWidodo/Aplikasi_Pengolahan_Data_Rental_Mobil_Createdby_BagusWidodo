<?php 

$ambil = $koneksi->query("SELECT * FROM tbl_transaksi WHERE id_transaksi='$_GET[id]'");
$data = $ambil->fetch_assoc();

?>

<?php 

$koneksi->query("DELETE FROM tbl_transaksi WHERE id_transaksi='$_GET[id]'");

echo "<script>alert('Data Transaksi Terhapus');</script>";
echo "<script>location='index.php?halaman=transaksi';</script>";

?>

