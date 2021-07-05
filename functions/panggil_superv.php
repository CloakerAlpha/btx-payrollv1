<?php
    // memanggil file proses utama crud
    include 'base_pdo.php';
    include 'prosescrud.php';
    // cara panggil class di koneksi php
    $db = new Koneksi();
    // cara panggil koneksi di fungsi DBConnect()
    $koneksi =  $db->DBConnect();
    // panggil class prosesCrud di file prosescrud.php
    $proses = new crudOperations($koneksi);
    // panggil session ID
    $id = $_SESSION['SUPER']['id_admin'];
    $sesi = $proses->tampil_data_id('staff_admin','id_admin',$id);
?>