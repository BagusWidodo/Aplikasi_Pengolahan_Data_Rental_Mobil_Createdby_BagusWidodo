<?php 
$pilih = $koneksi->query("SELECT * FROM tbl_mobil WHERE id_mobil='$_GET[id]'");
$data = $pilih->fetch_assoc();

$id = $koneksi->query("SELECT MAX(id_transaksi) AS no_max FROM tbl_transaksi");
$no_max = $id->fetch_assoc();
$id_transaksi=$no_max['no_max'];
$id_transaksi++;

$tgl=date('Y-m-d');

?>

<h2>DATA TRANSKASI</h2>
<form method="POST" autocomplete="off">
	<div class="form-group">
		<label>No. KTP</label>
		<input type="text" name="no_ktp" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>No. Telephone</label>
		<input type="text" name="no_hp" class="form-control">
	</div>
	<div class="form-group">
		<label>No. Polisi</label>
		<input type="text" name="no_polisi" class="form-control" value="<?php echo $data['no_polisi'] ?>" >
	</div>
	<div class="form-group">
		<label>Harga Sewa / Hari</label>
		<input type="text" name="harga" class="form-control" value="<?php echo $data['harga'];?>" disabled>
	</div>
	<div class="form-group">
		<label>Lama Sewa</label>
		<input type="text" name="lama" class="form-control">
	</div>
	
	<!-- <div class="form-group"> -->
		<!-- <label>Total</label> -->
		<!-- <input type="text" name="total" class="form-control" value="<?php echo $total; ?>"> -->
	<!-- </div>	 -->

	<br>
	<button type="submit" class="btn btn-success" name="proses">PROSES</button>
</form>

<?php

if (isset($_POST['proses'])) {
	$harga=$data['harga'];
	$lama=$_POST["lama"];
	$total=$harga*$lama;
	$status="Mobil Belum Kembali";
	$koneksi->query("INSERT INTO tbl_pelanggan (no_ktp, nama, telephone) VALUES ('$_POST[no_ktp]','$_POST[nama]','$_POST[no_hp]')");
	$koneksi->query("INSERT INTO tbl_transaksi (no_ktp, tanggal, total) VALUES ('$_POST[no_ktp]','$tgl','$total')");
	$koneksi->query("INSERT INTO tbl_transaksi_sewa (id_transaksi, no_polisi, lama_sewa, status) VALUES ('$id_transaksi','$_POST[no_polisi]','$_POST[lama]','$status')");
	echo "<script>alert('Data Tersimpan');</script>";
	echo "<script>location='index.php?halaman=transaksi';</script>";
}

?>