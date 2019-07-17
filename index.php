<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>

	<title>Sistem Informasi Laundry</title>

</head>
<body style="background: #f0f0f0">
	<br/>

	<center>
		<h2><b>SISTEM INFORMASI LAUNDRY</b></h2>
	</center>

	<br/>
	<br/>
	
	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					echo "<div class='alert alert-danger'>Login gagal! username atau password Anda salah!</div>";
				}else if($_GET['pesan'] == "logout"){
					echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
				}else if($_GET['pesan'] == "belum_login"){
					echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
				}
			}
			?>			
			
			<form action="login.php" method="post">
				<div class="panel">
					<div class="panel-body">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" placeholder="Masukkan username" name="username" required="requaired">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" placeholder="Masukkan password" name="password" required="requaired">
							<br/>
							</div>
						<input type="submit" class="btn btn-primary btn-block" value="Log In">				
					</div>
				</div>
				<a href="dokumentasi.html">Dokumentasi</a>
			</form>

		</div>
	</div>
</body>
</html>