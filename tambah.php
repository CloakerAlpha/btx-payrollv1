<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require 'functions/panggil.php';
?>

<style>
    .btn-tambahdata{
        background-color: #323232;
        color: #fff;
    }
    .btn-kembali{
        background-color: #ffac41;
        color: #323232;
    }
    .btn-logout{
        background-color: #fff;
        color: #323232;
    }
</style>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Data Pegawai</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/all.min.css">
	</head>
    <body style="background: #323232;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['namalengkap'];?></span>
			<div class="float-right">	
				<a href="index.php" class="btn btn-kembali btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-logout btn-md float-right"><span class="fa fa-power-off"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Tambah Pengguna</h4>
						</div>
						<div class="card-body">
							<form action="functions/crud.php?aksi=tambah" method="POST">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" value="" class="form-control" name="namapegawai">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" value="" class="form-control" name="tempat_lahir">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="text" value="" class="form-control" name="tanggal_lahir">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<input type="text" value="" class="form-control" name="jenis_kelamin">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" value="" class="form-control" name="jabatan">
								</div>
								<div class="form-group">
									<label>Gaji Pokok</label>
									<input type="text" value="" class="form-control" name="gapok">
								</div>
								<div class="form-group">
									<label>Tunjangan</label>
									<input type="text" value="" class="form-control" name="tunjangan">
								</div>
								<button class="btn btn-tambahdata btn-md" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>