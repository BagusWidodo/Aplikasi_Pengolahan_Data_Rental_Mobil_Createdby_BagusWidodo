<?php 

$ambil = $koneksi->query("SELECT * FROM tbl_mobil WHERE id_mobil='$_GET[id]'");
$data = $ambil->fetch_assoc();
$fotomobil = $data['foto_mobil'];
if (file_exists("foto_mobil/$fotomobil")) 
{
	unlink("foto_mobil/$fotomobil");
}

$koneksi->query("DELETE FROM tbl_mobil WHERE id_mobil='$_GET[id]'");

echo "<script>alert('Data Mobil Terhapus');</script>";
echo "<script>location='index.php?halaman=mobil';</script>";

?>

