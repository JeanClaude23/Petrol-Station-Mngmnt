<?php
	require_once "dompdf/autoload.inc.php";
	use Dompdf\Dompdf;

	// $file_name = md5(rand()) . '.pdf';
	$file_name = "Receipt" . '.pdf';
	$dompdf  = new Dompdf();
	$dompdf->loadHtml($message);
	$dompdf->setPaper('A4','landscape');
	$dompdf->render();
	$file = $dompdf->output();
	file_put_contents($file_name, $file);

?>