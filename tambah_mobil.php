<h2>Tampilan Tambah Mobil</h2>

<form method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="form-group">
  <label>No. Polisi</label>
  <input type="text" class="form-control" name="no_polisi">
</div>
<div class="form-group">
  <label>Nama</label>
  <input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
  <label>Harga Rp.</label>
  <input type="text" class="form-control" name="harga">
</div>
<div class="form-group">
  <label>Deskripsi</label>
  <textarea class="form-control" name="ket" rows="10"></textarea>
</div>
<div class="form-group">
  <label>Foto</label>
  <input type="file" class="form-control" name="foto">
</div><br>
<button class="btn btn-success" name="simpan">SIMPAN</button>
</form>

<?php

if (isset($_POST['simpan'])) 
{
  $nama = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "foto_mobil/".$nama);
  $koneksi->query("INSERT INTO tbl_mobil (no_polisi, nama, harga, foto_mobil, ket) VALUES ('$_POST[no_polisi]','$_POST[nama]','$_POST[harga]','$nama','$_POST[ket]')");

  echo "<div class='alert alert-info'>Data Telah Disimpan</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=mobil'>";

}

?>

