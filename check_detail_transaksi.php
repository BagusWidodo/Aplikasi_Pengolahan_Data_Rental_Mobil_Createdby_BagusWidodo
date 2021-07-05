<?php 
$pilih = $koneksi->query("SELECT * FROM tbl_transaksi_sewa JOIN tbl_transaksi ON tbl_transaksi_sewa.id_transaksi=tbl_transaksi.id_transaksi WHERE tbl_transaksi_sewa.id_transaksi_sewa='$_GET[id_transaksi_sewa]'");
$data = $pilih->fetch_assoc();

$tgl=date('Y-m-d');

$tanggal = $data['tanggal'];
$tanggal1 = new DateTime($tanggal);
$tanggal2 = new DateTime();
 
$perbedaan = $tanggal2->diff($tanggal1)->format("%a");
$denda = $perbedaan*35000;


?>

<h2>CHECK DATA TRANSAKSI</h2>

<form method="POST" autocomplete="off">
	<div class="form-group">
		<label>Tanggal Pinjam</label>
		<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>" disabled>
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
			<option value="Mobil Sudah Kembali">Mobil Sudah Kembali</option>
		</select>
	</div>
	<div class="form-group">
		<label>Tanggal Kembali</label>
		<input type="date" name="tanggal_kembali" class="form-control" value="<?php echo $tgl; ?>">
	</div>
	<div class="form-group">
		<label>Denda</label>
		<input type="text" name="denda" class="form-control" value="<?php echo $denda; ?>" disabled>
		<p><small>Denda Rp. 35.000,-/Hari</small></p>
	</div>
	<br>
	<button class="btn btn-primary" name="check">CHECK</button>
</form>

<?php

if (isset($_POST['check'])) {
	$status=$_POST['status'];
	$koneksi->query("UPDATE tbl_transaksi_sewa SET status='$status', tanggal_kembali='$tgl', denda='$denda' WHERE id_transaksi_sewa='$_GET[id_transaksi_sewa]'");
	echo "<script>alert('Data Telah Berhasil di Check');</script>";
	echo "<script>location='index.php?halaman=transaksi';</script>";
}

?>