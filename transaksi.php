<h2>Halaman Transaksi</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Total</th>
      <th scope="col" width="250px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.no_ktp=tbl_pelanggan.no_ktp"); ?>
    <?php while ($data = $ambil->fetch_assoc()) { ?>
    <tr>
      <th scope="row"><?php echo $nomor; ?></th>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['tanggal']; ?></td>
      <td>Rp. <?php echo number_format($data['total']); ?>,-</td>
      <td>
        <a href="index.php?halaman=hapus_transaksi&id=<?php echo$data['id_transaksi']; ?>" class="btn btn-danger">HAPUS</a>
        <a href="index.php?halaman=edit_transaksi&id=<?php echo$data['id_transaksi']; ?>" class="btn btn-warning">EDIT</a>
        <a href="index.php?halaman=detail&id=<?php echo $data['id_transaksi'];?>" class="btn btn-primary">DETAIL</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
