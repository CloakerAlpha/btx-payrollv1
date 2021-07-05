<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    // panggil file
    require 'functions/panggil.php';
?>

<style>
    #usertype{
        font-weight: bold;
    }
    .session_container{
        text-align: center;
        width: auto;
        padding: 10px;
        border-radius: 10px;
        margin: 10px;
        background-color: #ffac41;
        color: #323232;
    }
    .btn-edit{
        background-color: #ffac41;
        color: #323232;
    }
    .btn-logout{
        padding: 10px;
        border-radius: 10px;
        margin: 10px;
        background-color: #fff;
        color: #323232;
    }
</style>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Payroll App BTX1</title>
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="css/bs1.css">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="css/bs2_datatables.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/all.min.css">

        <!-- jQuery -->
        <script type="text/javascript" src="js/bs4_jquery.js"></script>
        <!-- DATATABLES BS 4-->
        <script src="js/bs5_datatables.js"></script>
        <!-- BOOTSTRAP 4-->
        <script src="js/bs6_databalesmin.js"></script>

	</head>
    <body style="background:#323232;">
		<div class="container">
			<div class="row">
				<div class="base_bg" style="align-content: center;width: auto;">

                    <?php if(!empty($_SESSION['ADMIN'])){?>
                    <br/>
                    <div class="session_container">
                        <div>
                            <span >Akun : </span>
                            <span id="usertype" style="color:#fff";><?php echo $sesi['username'];?></span>
                        </div>
                            <a href="logout.php" class="btn btn-logout btn-md"><span class="fa fa-power-off"></span> Logout</a>
                    </div>
                    
                   
                    <br/>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan</th>
                                        <th>Gaji Total</th>
                                        <th>Status</th>
                                        <th style="text-align: center;">Edit Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $hasil = $proses->tampil_data('pegawai');
                                    foreach($hasil as $datapegawai){
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $datapegawai['namapegawai']?></td>
                                        <td><?php echo $datapegawai['tempat_lahir'];?></td>
                                        <td><?php echo $datapegawai['tanggal_lahir'];?></td>
                                        <td><?php echo $datapegawai['jenis_kelamin'];?></td>
                                        <td><?php echo $datapegawai['jabatan'];?></td>
                                        <td><?php echo $datapegawai['gapok'];?></td>
                                        <td><?php echo $datapegawai['tunjangan'];?></td>
                                        <td><?php echo $datapegawai['gajitotal'];?></td>
                                        <td><?php echo $datapegawai['status'];?></td>
                                        <td style="text-align: center;">

                                            <a href="review_data.php?id=<?php echo $datapegawai['id_pegawai'];?>" class="btn btn-edit btn-md btn_edit">                                            
                                            <span class="fa fa-edit" ></span></a>

                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php }else{?>
                        <br/>
                        <div class="alert alert-info">
                            <h3> Silahkan Login Terlebih Dahulu !</h3>
                            <hr/>
                            <p><a href="login.php">Login Disini</a></p>
                        </div>
                    <?php }?>
			    </div>
			</div>
		</div>
        <script>
            $('#mytable').dataTable();
/*            tipe ='user';
            window.onload = function checkuser() {
                let tipe = document.getElementById("usertype").innerText;
                if (tipe == 'admin'){
                    document.getElementById("btn-tambah").style.display = '';
                } else{
                    document.getElementById("btn-tambah").style.display = 'none';
                }

            };*/
            
        </script>
	</body>
</html>
