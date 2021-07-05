<h2>Halaman Pelanggan</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" width="70px">NO.</th>
      <th scope="col">Nama</th>
      <th scope="col">Telephone</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tbl_pelanggan"); ?>
    <?php while ($data = $ambil->fetch_assoc()) { ?>
    <tr>
      <th scope="row"><?php echo $nomor; ?></th>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['telephone']; ?></td>
      <td>
        <a href="index.php?halaman=hapus_pelanggan&no_ktp=<?php echo $data['no_ktp']; ?>" class="btn btn-danger">HAPUS</a> 
      </td> 
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>

