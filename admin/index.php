<?php 
    session_start();
    if($_SESSION['level'] !== 'admin'){
        header("location:../cek_session.php");  
    }
include 'header1.php';

include '../koneksi.php'; 
?>

<div class="container">
	<div class="panel">
		<div class="panel-heading">
			<h4>Dashboard</h4>
		</div>
		<div class="panel-body">
			
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h1>
								<i class="glyphicon glyphicon-user"></i> 
								<span class="pull-right">
									
									<?php 
									$pelanggan = mysqli_query($koneksi,"select * from pelanggan");
									echo mysqli_num_rows($pelanggan);
									?>
								</span>
							</h1>
							<b>Jumlah Pelanggan</b>
						</div>						
					</div>				
				</div>		

				<div class="col-md-3">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h1>
								<i class="glyphicon glyphicon-refresh"></i> 
								<span class="pull-right">
									
									<?php 
									$proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status='0'");
									echo mysqli_num_rows($proses);
									?>
								</span>
							</h1>
							<b>Jumlah Pakaian Di Proses</b>
						</div>						
					</div>				
				</div>		

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h1>
								<i class="glyphicon glyphicon-info-sign"></i> 
								<span class="pull-right">
									
									<?php 
									$proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status='1'");
									echo mysqli_num_rows($proses);
									?>
								</span>
							</h1>
							<b>Jumlah Pakaian Dicuci</b>
						</div>						
					</div>				
				</div>

				<div class="col-md-3">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h1>
								<i class="glyphicon glyphicon-flash"></i> 
								<span class="pull-right">
									
									<?php 
									$proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status='3'");
									echo mysqli_num_rows($proses);
									?>
								</span>
							</h1>
							<b>Jumlah Pakaian Disetrika</b>
						</div>						
					</div>				
				</div>

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h1>
								<i class="glyphicon glyphicon-import"></i>
								<span class="pull-right">

									<?php
									$proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status='4'");
									echo mysqli_num_rows($proses);
									?>
								</span>
							</h1>
							<b>Jumlah Pakaian Dikemas</b>
						</div>
					</div>
				</div>
						
				<div class="col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h1>
								<i class="glyphicon glyphicon-ok-sign"></i> 
								<span class="pull-right">
									
									<?php 
									$proses = mysqli_query($koneksi,"select * from transaksi where transaksi_status='2'");
									echo mysqli_num_rows($proses);
									?>
								</span>
							</h1>
							<b>Jumlah Pakaian Selesai</b>
						</div>						
					</div>				
				</div>				
			</div>		

		</div>
	</div>

	<div class="panel">
		<div class="panel-heading">
			<h4>Riwayat Transaksi Terakhir</h4>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Invoice</th>
					<th>Tanggal</th>
					<th>Pelanggan</th>
					<th>Berat (Kg)</th>
					<th>Tgl. Selesai</th>
					<th>Harga</th>
					<th>Status</th>									
				</tr>

				<?php 				
				// mengambil data pelanggan dari database
				$data = mysqli_query($koneksi,"SELECT * FROM pelanggan A INNER JOIN transaksi B ON A.pelanggan_id = B.transaksi_pelanggan order by transaksi_id desc limit 7");
				$no = 1;
				// mengubah data ke array dan menampilkannya dengan perulangan while
				while($d=mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
						<td><?php echo date("d-F-Y",strtotime($d['transaksi_tgl'])); ?></td>
						<td><?php echo $d['pelanggan_nama']; ?></td>
						<td><?php echo $d['transaksi_berat']; ?></td>
						<td><?php echo date("d-F-Y",strtotime($d['transaksi_tgl_selesai'])); ?></td>
						<td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
						<td>
							<?php 
							if($d['transaksi_status']=="0"){
								echo "<div class='label label-danger'>PROSES</div>";
							}else if($d['transaksi_status']=="1"){
								echo "<div class='label label-info'>DI CUCI</div>";
							}else if($d['transaksi_status']=="3"){
								echo "<div class='label label-primary'>SETRIKA</div>";
							}else if($d['transaksi_status']=="4"){
								echo "<div class='label label-info'>DI KEMAS</div>";
							}else if($d['transaksi_status']=="2"){
								echo "<div class='label label-success'>SELESAI</div>";
							}
							?>							
						</td>						
					</tr>
					<?php 
				}
				?>
			</table>
		</div>
	</div>


</div>

<?php include 'footer.php'; ?>
