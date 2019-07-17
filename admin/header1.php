<?php
if($_SESSION['username']="ridwan"){  
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Laundry</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/skins/skin-purple.min.css">
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">

</head>
<body style="background: #ffc694">

	<!-- menu navigasi -->
	<nav class="navbar navbar-light" style="background-color: #ff7f0f" style="border-radius: 0px">
		<div class="container-fluid">			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php" style="color: #ffffff"><b>D&S</b> Laundry & Dry Cleaning</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php" class="text-success"><i class="glyphicon glyphicon-home"></i><b> Dashboard</b></a></li>
					<li><a href="pelanggan.php" class="text-success"><i class="glyphicon glyphicon-user"></i><b> Pelanggan</b></a></li>																		
					<li><a href="transaksi.php" class="text-success"><i class="glyphicon glyphicon-random"></i><b> Transaksi</b></a></li>
					<li><a href="laporan.php" class="text-success"><i class="glyphicon glyphicon-list-alt"></i><b> Laporan</b></a></li>
					<li class="dropdown">
						<a href="#" class="text-success" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-wrench"></i><b> Pengaturan </b><span class="caret"></span></a>
						<ul class="dropdown-menu">							
							<li><a href="harga.php" class="text-success"><i class="glyphicon glyphicon-usd"></i> Pengaturan Harga</a></li>
							<li><a href="ganti_password.php" class="text-success"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
						</ul>
					</li>
					<li><a href="../logout.php" class="text-success"><i class="glyphicon glyphicon-log-out"></i><b> Log Out</b></a></li>
				</ul>				
				<ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text" style="color: #ffffff">Halo, <b><?php echo $_SESSION['username']; ?></b>!</p></li>					
				</ul>
			</div>
		</div>
	</nav>
	<!-- akhir menu navigasi -->
</body>
</html>