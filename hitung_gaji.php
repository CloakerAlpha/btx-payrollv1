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
    .btn-kembali, .btn-printgaji{
        background-color: #ffac41;
        color: #323232;
    }
    .btn-logout{
        background-color: #fff;
        color: #323232;
    }
    .btn-refresh{
        background-color:darkgreen;
        color: #fff;
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
                                <p style="text-align: center;">PT. MEKAR JAYA</p>
								<div class="form-group">
									<label>Nama </label>
									<input type="text" value="<?php echo $hasil['namapegawai'];?>" class="form-control" name="namapegawai">

								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" value="<?php echo $hasil['jabatan'];?>" class="form-control" name="jabatan">

								</div>
                                <div class="form-group">
									<label>Periode</label>
									<input type="text" value="<?php echo date('d / M / y');?>" class="form-control" name="periode" readonly>

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
                                <div class="form-group" id="upahlemburperjam">
                                    <label>Upah Lembur Per Jam</label>
									<input type="number" value="" class="form-control upahlembur" 
                                    id="upahlembur" name="upah_lembur" onkeyup="hitung();">

								</div>
                                <div class="form-group" id="jam_lembur">
									<label>Jam Lembur</label>
									<input type="text" value="" class="form-control jamlembur" 
                                    id="jamlembur" name="jam_lembur"onkeyup="hitung();">

								</div>
                                <div class="form-group"  id="totallembur">
									<label>Total Upah Lembur</label>
									<input type="text" value="" class="form-control totalupahlembur" 
                                    id="total_lembur" name="total_lembur"onkeyup="hitung();">

								</div>
                                <div class="form-group">
									<label>NWNP</label>
									<input type="text" value="" class="form-control" 
                                    id="nwnp"
                                    name="nwnp"
                                    onkeyup="hitung();">

								</div>
                                <div class="form-group">
									<label>BPJS</label>
									<input type="text" value="" class="form-control" id="bpjs" name="bpjs" onkeyup="hitung();">

								</div>
                                <div class="form-group">
									<label>Gaji Total</label>
									<input type="text" value="" class="form-control" 
                                    id="gajitotal"
                                    name="gajitotal"
                                    onkeyup="hitung();">

								</div>
								
                                <button class="btn btn-updategaji btn-md" name="create"><i class="fa fa-calculator"> </i> Update Gaji</button>
                                <input type="button" class="btn btn-printgaji btn-md" value="Cetak Data" onclick="printPage()" />
                                <input type="button" class="btn btn-modeprint btn-md" value="Mode Print" onclick="modePrint()" />
                                <input type="button" class="btn btn-refresh btn-md" value="Refresh Data" onclick="document.location.reload(true)" />
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
      let gapok = document.getElementById('gapok').value;
      let jamlembur = document.getElementById('jamlembur').value;
      let tunjangan = document.getElementById('tunjangan').value;
      let ratelembur = parseInt(gapok)/173;
      let potonganbpjs = parseInt(gapok)+parseInt(tunjangan);
      if (!isNaN(ratelembur)) {
         document.getElementById('upahlembur').value = Math.round(ratelembur);
      }
      if (!isNaN(potonganbpjs)) {
         document.getElementById('bpjs').value = potonganbpjs;
      }
    }
    
    window.onkeyup = function hitung() {
      let totaljam=1;
      let gapok = document.getElementById('gapok').value;
      let jamlembur = document.getElementById('jamlembur').value;
      let tunjangan = document.getElementById('tunjangan').value;
      let nwnp = document.getElementById('nwnp').value;
      let ratelembur = parseInt(gapok)/173;
      let potonganbpjs = (parseInt(gapok)+parseInt(tunjangan))*0.03;

    
      if (!isNaN(ratelembur)) {
         document.getElementById('upahlembur').value = Math.round(ratelembur);
      }
////////////////////
            if (parseInt(jamlembur)<5){
                totaljam = parseInt(jamlembur)*1;
            } else {
                totaljam = parseInt(jamlembur)*2;
            }
            totallembur = parseInt(totaljam)*parseInt(ratelembur);
////////////////////
      if (!isNaN(totallembur)) {
         document.getElementById('total_lembur').value = Math.round(totallembur);
      }

      if (!isNaN(potonganbpjs)) {
         document.getElementById('bpjs').value = potonganbpjs;
      }
      
      // - potongan NWNP = jumlah hari tidak hadir (non hari libur) x gaji pokok / 30
      potongan_nwnp = (parseInt(nwnp)*parseInt(gapok))/30;

      // Total gaji perbulan = Gaji pokok + Tunjangan tetap + Upah lembur - Potongan NWNP - Potongan BPJS
      gajitotal = parseInt(gapok)+parseInt(tunjangan)+parseInt(totallembur)-parseInt(potongan_nwnp)-parseInt(potonganbpjs);

      if (!isNaN(gajitotal)) {
         document.getElementById('gajitotal').value = gajitotal;
      }

    }

    function printPage(jamlembur) {
        window.print();
        
   }
   function modePrint() {
        document.getElementById("totallembur").style.display = 'none';
        document.getElementById("jam_lembur").style.display = 'none';
        document.getElementById("upahlemburperjam").style.display = 'none';
      
   }
</script>
</html>