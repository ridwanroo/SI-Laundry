<?php include 'header1.php'; ?>

<div class="container">
	<div class="panel">
		<div class="panel-heading">
			<h4>Data Pelanggan</h4>
		</div>
		<div class="panel-body">

			<!--<a href="pelanggan_tambah.php" class="btn btn-info pull-right">Tambah</a>-->
			<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModalLong">Tambah</button>
			
			<br/>
			<br/>
			<br/>
			<br/>

			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th width="15%">Nama</th>
					<th width="15%">Nomor Handphone</th>
					<th>Alamat</th>
					<th width="15%">OPSI</th>
				</tr>

				<?php 
				// koneksi database
				include '../koneksi.php';

				// mengambil data pelanggan dari database
				$data = mysqli_query($koneksi,"select * from pelanggan order by pelanggan_id desc");
				$no = 1;
				// mengubah data ke array dan menampilkannya dengan perulangan while
				while($d=mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['pelanggan_nama']; ?></td>
						<td><?php echo $d['pelanggan_hp']; ?></td>
						<td><?php echo $d['pelanggan_alamat']; ?></td>
						<td>
							<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModaledit<?= $d['pelanggan_id'];?>">Update</button>
							<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal<?= $d['pelanggan_id'];?>">Hapus</button>
						</td>
					</tr>
					<?php 
				}
				?>
			</table>
		</div>
	</div>
</div>


<!-- Modal Hapus -->
<?php

	$data = mysqli_query($koneksi,"select * from pelanggan");
	while($h=mysqli_fetch_array($data)){
?>
<div class="modal fade" id="exampleModal<?= $h['pelanggan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel"><b>Hapus Pelanggan</b></h3>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus <b><?= $h['pelanggan_nama']; ?></b> dari daftar pelanggan?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="pelanggan_hapus.php?id=<?php echo $h['pelanggan_id']; ?>" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	 <button type="button" class="close batal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pelanggan Baru</h5>
      </div>
      <div class="modal-body">
      	<div class="container">
      	<div class="col-md-5">
		<div class="panel">
			<div class="panel-body">

				<form method="post" autocomplete="off" action="pelanggan_aksi.php">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" id="nama" class="form-control" name="nama" placeholder="Ketik nama">
					</div>	

					<div class="form-group">
						<label>Nomor Handphone</label>
						<input type="text" class="form-control hp" name="hp" placeholder="Ketik nomor handphone" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
					</div>	

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control alamat" name="alamat" placeholder="Ketik alamat">
					</div>	
			</div>
		</div>
		</div>
		</div>

      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-danger batal" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
		</form>

      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<?php

	$data = mysqli_query($koneksi,"select * from pelanggan");
	while($e=mysqli_fetch_array($data)){
?>
<div class="modal fade" id="exampleModaledit<?= $e['pelanggan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel"><b>Edit Pelanggan</b></h3>
      </div>
      <div class="modal-body">
      	<div class="container">
      	<div class="col-md-5">
		<div class="panel">
			<div class="panel-body">

				<form method="post" autocomplete="off" action="pelanggan_edit.php">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" id="nama" class="form-control" value="<?= $e['pelanggan_nama'] ?>" name="nama" placeholder="Ketik nama">
					</div>	

					<div class="form-group">
						<label>Nomor Handphone</label>
						<input type="text" class="form-control" value="<?= $e['pelanggan_hp'] ?>" name="hp" placeholder="Ketik nomor handphone" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
					</div>	

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" value="<?= $e['pelanggan_alamat'] ?>" name="alamat" placeholder="Ketik alamat">
					</div>	
			</div>
		</div>
		</div>
		</div>

      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
		</form>

      </div>
    </div>
  </div>
</div>
<?php } ?>


<?php include 'footer.php'; ?>