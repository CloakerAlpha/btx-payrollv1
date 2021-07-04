<?php
include_once'../functions/base.php';

$query = mysqli_query($conn, 'select * from db_absensi');

if (mysqli_num_rows($query) > 0) {
	# buat array
	$responsistem = array();
	$responsistem["data"] = array();
	while ($row = mysqli_fetch_assoc($query)) {
		# kerangka format penampilan data json
		$data['no_index'] = $row["no_index"];
		$data['namapegawai'] = $row["namapegawai"];
		$data['jumlah_harikerja'] = $row["jumlah_harikerja"];
		array_push($responsistem["data"], $data);

	}
	echo json_encode($responsistem);
} else {
	# menmapilkan pesan jika tidak ada data dalam tabel
	$responsistem["message"]="tidak ada data";
	echo json_encode($responsistem);
}
?>