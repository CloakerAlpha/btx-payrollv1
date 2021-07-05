<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require 'functions/panggil.php';
    
    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $proses->tampil_data_id('pegawai','id_pegawai',$idGet);
?>

<style>
    .btn-updatedata{
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

		<title>Edit Pengguna</title>
        <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
        <script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background: #323232;;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['namalengkap'];?></span>
			<div class="float-right">	
				<a href="index.php" class="btn btn-kembali btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-logout btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Cetak Data Pegawai - <?php echo $hasil['namapegawai'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="functions/crud.php?aksi=edit" id="" method="POST">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" value="<?php echo $hasil['namapegawai'];?>"
                                    class="form-control" name="namapegawai" readonly>

								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" value="<?php echo $hasil['jabatan'];?>" 
                                    class="form-control" name="jabatan" readonly>

								</div>
								<div class="form-group">
									<label>Gaji Pokok</label>
									<input type="text" value="<?php echo $hasil['gapok'];?>"
                                     class="form-control" name="gapok" readonly>

								</div>
								<div class="form-group">
									<label>Tunjangan</label>
									<input type="text" value="<?php echo $hasil['tunjangan'];?>"
                                     class="form-control" name="tunjangan" readonly>
									<input type="hidden" value="<?php echo $hasil['id_pegawai'];?>"
                                     class="form-control" name="id_pegawai">
								</div>
                                <div class="form-group">
									<label>Gaji Pokok</label>
									<input type="text" value="<?php echo $hasil['gapok'];?>"
                                     class="form-control" name="gapok" readonly>

								</div>
                                <div class="form-group">
									<label>NWNP</label>
									<input type="text" value="<?php echo $hasil['nwnp'];?>"
                                     class="form-control" name="gapok" readonly>

								</div>

							</form>
                            <input type="button" value="Print Halaman Ini!" onclick="printPage()" />
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
    <script>
   function printPage() {
      window.print();
   }
</script>
</html>