<?php
	require_once "dompdf/autoload.inc.php";
	use Dompdf\Dompdf;

	$message  = "<h1>Hello There</h1>";
	// $file_name = md5(rand()) . '.pdf';
	$file_name = "Muhire" . '.pdf';
	$dompdf  = new Dompdf();
	$dompdf->loadHtml($message);
	$dompdf->setPaper('A4','landscape');
	$dompdf->render();
	$file = $dompdf->output();
    $dompdf->stream();
	file_put_contents($file_name, $file);

?>