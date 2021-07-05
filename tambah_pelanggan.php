<h2>Tambah Data Pelanggan</h2>
<form method="POST" autocomplete="off">
<div class="form-group">
	<label>E-Mail</label>
	<input type="text" class="form-control" name="email">
</div>
<div class="form-group">
	<label>Password</label>
	<input type="text" class="form-control" name="password">
</div>
<div class="form-group">
	<label>Nama Pelanggan</label>
	<input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
	<label>Telephone</label>
	<input type="text" class="form-control" name="telephone">
</div>
<button class="btn btn-success" name="simpan">SIMPAN</button>
</form>

<?php 

if (isset($_POST['simpan'])) 
{
  $koneksi->query("INSERT INTO tbl_pelanggan (email, password, nama, telephone) VALUES ('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telephone]')");

  echo "<div class='alert alert-info'>Data Telah Disimpan</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";

}

?>