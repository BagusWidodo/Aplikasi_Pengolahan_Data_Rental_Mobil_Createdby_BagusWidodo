<?php 
$ambil = $koneksi->query("SELECT * FROM tbl_mobil WHERE id_mobil='$_GET[id]' ");
$data = $ambil->fetch_assoc();
?>

<h2>EDIT DATA MOBIL</h2>

<form method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="form-group">
  <label>No. Polisi</label>
  <input type="text" class="form-control" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
</div>
<div class="form-group">
  <label>Nama</label>
  <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
</div>
<div class="form-group">
  <label>Harga Rp.</label>
  <input type="text" class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
</div>
<div class="form-group">
  <img src="foto_mobil/<?php echo $data['foto_mobil'];?>" width="200px" >
</div>
<div class="form-group">
	<label>Ganti Foto</label>
  	<input type="file" class="form-control" name="foto">
</div>
<div class="form-group">
  <label>Deskripsi</label>
  <textarea class="form-control" name="ket" rows="10"><?php echo $data['ket']; ?></textarea>
</div><br>
<button class="btn btn-primary" name="edit">EDIT</button>
</form>

<?php 

if (isset($_POST['edit'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];

	if (!empty($lokasi)) 
	{
		move_uploaded_file($lokasi, "foto_mobil/$nama");
		$koneksi->query("UPDATE tbl_mobil SET no_polisi='$_POST[no_polisi]', nama='$_POST[nama]', harga='$_POST[harga]', foto_mobil='$nama', ket='$_POST[ket]' WHERE id_mobil='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE tbl_mobil SET no_polisi='$_POST[no_polisi]', nama='$_POST[nama]', harga='$_POST[harga]', ket='$_POST[ket]' WHERE id_mobil='$_GET[id]'");
	}
	echo "<script>alerrt('Data Mobil Diedit');</script>";
	echo "<script>location='index.php?halaman=mobil';</script>";
}

?>