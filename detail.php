<h2>Halaman Detail Transaksi</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NO.</th>
      <th scope="col">Nama Mobil</th>
      <th scope="col">Harga</th>
      <th scope="col">Lama Sewa</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Denda</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tbl_transaksi_sewa JOIN tbl_mobil ON tbl_transaksi_sewa.no_polisi=tbl_mobil.no_polisi WHERE tbl_transaksi_sewa.id_transaksi='$_GET[id]'"); ?>
    <?php $data = $ambil->fetch_assoc() ?>
    <tr>
      <th scope="row"><?php echo $nomor; ?></th>
      <td><?php echo $data['nama']; ?></td>
      <td>Rp. <?php echo number_format($data['harga']); ?>,-</td>
      <td><?php echo $data['lama_sewa']; ?> Hari</td>
      <td>Rp. <?php echo number_format($data['harga']*$data['lama_sewa']); ?>,-</td>
      <td><?php echo $data['status']?></td>
      <td><?php echo $data['tanggal_kembali']?></td>
      <td>Rp. <?php echo number_format($data['denda']); ?></td>
      <td>
        <?php 
        $status=$data['status'];
        if ($status=="Mobil Belum Kembali") 
          { ?>
          <a href="index.php?halaman=check_detail_transaksi&id_transaksi_sewa=<?php echo $data['id_transaksi_sewa'] ?>" class="btn btn-primary">Check</a>
        <?php } 
        else
        { ?>
          <a href="index.php?halaman=transaksi" class="btn btn-primary">Done
        <?php }
        ?>
        
      </td>
    </tr>
  </tbody>
</table>
