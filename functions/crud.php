<?php
//koneksi db
require 'panggil.php';

// proses persetujuan supervisor
if(!empty($_GET['aksi'] == 'edit'))
{
    $nama = strip_tags($_POST['namapegawai']);
    $tempatlahir = strip_tags($_POST['tempat_lahir']);
    $tanggallahir = strip_tags($_POST['tanggal_lahir']);
    $jeniskelamin = strip_tags($_POST['jenis_kelamin']);
    $jabatan = strip_tags($_POST['jabatan']);
    $gapok = strip_tags($_POST['gapok']);
    $tunjangan = strip_tags($_POST['tunjangan']);
    $status = strip_tags($_POST['status']);

        $data = array(
            'namapegawai'		=>$nama,
            'tempat_lahir'		=>$tempatlahir,
            'tanggal_lahir' 	=>$tanggallahir,
            'jenis_kelamin'		=>$jeniskelamin,
            'jabatan'			=>$jabatan,
            'gapok'		        =>$gapok,
            'tunjangan'			=>$tunjangan,
            'status'	    	=>$status
        );

    $tabel = 'pegawai';
    $where = 'id_pegawai';
    $id = strip_tags($_POST['id_pegawai']);
    $proses->edit_data($tabel,$data,$where,$id);
    echo '<script>alert("Edit Data Berhasil");window.location="../superpage.php"</script>';
}

// proses hitung
if(!empty($_GET['aksi'] == 'hitung'))
{
    $nama = strip_tags($_POST['namapegawai']);
    $gapok = strip_tags($_POST['gapok']);
    $tunjangan = strip_tags($_POST['tunjangan']);
    $gajitotal = strip_tags($_POST['gajitotal']);

        $data = array(
            'namapegawai'		=>$nama,
            'gapok'		        =>$gapok,
            'tunjangan'			=>$tunjangan,
            'gajitotal'			=>$gajitotal,
            //'status'	    	=>$status
        );

    $tabel = 'pegawai';
    $where = 'id_pegawai';
    $id = strip_tags($_POST['id_pegawai']);
    $proses->edit_data($tabel,$data,$where,$id);
    echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
}

    //proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $nama = strip_tags($_POST['namapegawai']);
        $tempatlahir = strip_tags($_POST['tempat_lahir']);
        $tanggallahir = strip_tags($_POST['tanggal_lahir']);
        $jeniskelamin = strip_tags($_POST['jenis_kelamin']);
        $jabatan = strip_tags($_POST['jabatan']);
        $gapok = strip_tags($_POST['gapok']);
        $tunjangan = strip_tags($_POST['tunjangan']);
        $status = 'pending';
        
        $tabel = 'pegawai';
        # proses insert
        $data[] = array(
            'namapegawai'		=>$nama,
            'tempat_lahir'		=>$tempatlahir,
            'tanggal_lahir' 	=>$tanggallahir,
            'jenis_kelamin'		=>$jeniskelamin,
            'jabatan'			=>$jabatan,
            'gapok'		        =>$gapok,
            'tunjangan'			=>$tunjangan,
            'status'	    	=>$status
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

// proses edit
if(!empty($_GET['aksi'] == 'edit'))
{
    $nama = strip_tags($_POST['namapegawai']);
    $tempatlahir = strip_tags($_POST['tempat_lahir']);
    $tanggallahir = strip_tags($_POST['tanggal_lahir']);
    $jeniskelamin = strip_tags($_POST['jenis_kelamin']);
    $jabatan = strip_tags($_POST['jabatan']);
    $gapok = strip_tags($_POST['gapok']);
    $tunjangan = strip_tags($_POST['tunjangan']);

        $data = array(
            'namapegawai'		=>$nama,
            'tempat_lahir'		=>$tempatlahir,
            'tanggal_lahir' 	=>$tanggallahir,
            'jenis_kelamin'		=>$jeniskelamin,
            'jabatan'			=>$jabatan,
            'gapok'		        =>$gapok,
            'tunjangan'			=>$tunjangan,
            //'status'	    	=>$status
        );

    $tabel = 'pegawai';
    $where = 'id_pegawai';
    $id = strip_tags($_POST['id_pegawai']);
    $proses->edit_data($tabel,$data,$where,$id);
    echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
}
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'pegawai';
        $where = 'id_pegawai';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);

        if($result != 'gagal')
        {
                // status yang diberikan 
                session_start();
                $_SESSION['ADMIN'] = $result;
                if($user=='admin'){
                    echo "<script>window.location='../index.php';</script>";
                } else if($user=='supervisor'){
                    echo "<script>window.location='../superpage.php';</script>";
                }
            
        }else{
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }
    }
?>