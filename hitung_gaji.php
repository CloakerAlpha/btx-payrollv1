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
    .btn-updategaji{
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
		<title>Perhitungan Gaji</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/all.min.css">
	</head>
    <body style="background: #323232;;">
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
						<h4 class="card-title">Perhitungan Gaji Pegawai - <?php echo $hasil['namapegawai'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="functions/crud.php?aksi=hitung" method="POST">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" value="<?php echo $hasil['namapegawai'];?>" class="form-control" name="namapegawai">

								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" value="<?php echo $hasil['jabatan'];?>" class="form-control" name="jabatan">

								</div>
								<div class="form-group">
									<label>Gaji Pokok</label>
									<input type="text" 
                                    value="<?php echo $hasil['gapok'];?>" 
                                    class="form-control"  
                                    id="gapok" 
                                    name="gapok" 
                                    onkeyup="hitung();">

								</div>
								<div class="form-group">
									<label>Tunjangan</label>
									<input type="text" 
                                    value="<?php echo $hasil['tunjangan'];?>" 
                                    class="form-control" 
                                    id="tunjangan" 
                                    name="tunjangan" 
                                    onkeyup="hitung();">
									<input type="hidden" value="<?php echo $hasil['id_pegawai'];?>" class="form-control" name="id_pegawai">
								</div>
                                <div class="form-group">
                                    <label>Upah Lembur Per Jam</label>
									<input type="number" value="" class="form-control upahlembur" id="upahlembur" name="upah_lembur" onkeyup="hitung();">

								</div>
                                <div class="form-group">
									<label>Jam Lembur</label>
									<input type="text" value="" class="form-control jamlembur"  id="jamlembur" name="jam_lembur">

								</div>
                                <div class="form-group"  id="totallembur">
									<label>Total Upah Lembur</label>
									<input type="text" value="" class="form-control totalupahlembur" name="total_lembur">

								</div>
                                <div class="form-group">
									<label>NWNP</label>
									<input type="text" value="" class="form-control" name="nwnp">

								</div>
                                <div class="form-group">
									<label>BPJS</label>
									<input type="text" value="" class="form-control" id="bpjs" name="bpjs" onkeyup="hitung();">

								</div>
                                <div class="form-group">
									<label>Gaji Total</label>
									<input type="text" value="" class="form-control" name="gajitotal">

								</div>
								
                                <button class="btn btn-updategaji btn-md" name="create"><i class="fa fa-calculator"> </i> Update Gaji</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
    <script>
    window.onload = function hitung() {
      var gapok = document.getElementById('gapok').value;
      var jamlembur = document.getElementById('jamlembur').value;
      let tunjangan = document.getElementById('tunjangan').value;
      var ratelembur = parseInt(gapok)/173;
      let potonganbpjs = parseInt(gapok)+parseInt(tunjangan);
      if (!isNaN(ratelembur)) {
         document.getElementById('upahlembur').value = Math.round(ratelembur);
      }
      if (!isNaN(potonganbpjs)) {
         document.getElementById('bpjs').value = potonganbpjs;
      }
    }
    window.onkeyup = function hitung() {
      let gapok = document.getElementById('gapok').value;
      let jamlembur = document.getElementById('jamlembur').value;
      let tunjangan = document.getElementById('tunjangan').value;
      let ratelembur = parseInt(gapok)/173;
      let potonganbpjs = (parseInt(gapok)+parseInt(tunjangan))*0.03;
      if (!isNaN(ratelembur)) {
         document.getElementById('upahlembur').value = Math.round(ratelembur);
      }
      if (!isNaN(potonganbpjs)) {
         document.getElementById('bpjs').value = potonganbpjs;
      }
    }
</script>
</html>