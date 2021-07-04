<?php
// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$dompdf->loadHtml('<h1>Selamat datang di Codingan.com</h1>');
// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Menjadikan HTML sebagai PDF
$dompdf->render();
// Output akan menghasilkan PDF ke Browser
$dompdf->stream("struk_gaji",array("Attachment"=>0));

?>