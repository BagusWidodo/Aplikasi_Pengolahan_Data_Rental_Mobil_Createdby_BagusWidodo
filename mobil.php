<h2>Halaman Mobil</h2><hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col" width="100px">No. Polisi</th>
      <th scope="col" width="150px">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Foto</th>
      <th scope="col" width="200px">Ket</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tbl_mobil"); ?>
    <?php while ($data = $ambil->fetch_assoc()) { ?>
    <tr>
      <th scope="row"><?php echo $nomor; ?></th>
      <td><?php echo $data['no_polisi']; ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td>Rp. <?php echo number_format($data['harga']); ?></td>
      <td><img src="foto_mobil/<?php echo $data['foto_mobil'];?>" width=200px></td>
      <td><?php echo $data['ket']; ?></td>
      <td>
        <a href="index.php?halaman=hapus_mobil&id=<?php echo $data['id_mobil']; ?>" class="btn btn-danger">HAPUS</a>
        <a href="index.php?halaman=edit_mobil&id=<?php echo $data['id_mobil']; ?>" class="btn btn-warning">EDIT</a>
        <a href="index.php?halaman=tambah_transaksi&id=<?php echo $data['id_mobil']; ?>" class="btn btn-primary">SEWA</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambah_mobil" class="btn btn-success">TAMBAH MOBIL</a>
