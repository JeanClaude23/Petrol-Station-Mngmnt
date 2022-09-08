<?php
	
	session_start();

	require_once "dompdf/autoload.inc.php";
	use Dompdf\Dompdf;

	include 'spClass.php';
	$spObject  = new  spClass();



	switch (@$_GET['brilliant']) {
		case 'reportBasedOnUser':
			 $FilterClientUser  = @$_GET['pompisteUsername'];
			 $myOwnAccount  = @$_GET['myOwnAccount'];
			 $filteDataForUser  = $spObject->selectFilteredDataByPompisteName($FilterClientUser,$myOwnAccount);
		

			 $output  = "";
			 $output .= "<table>";
			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";			 

			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";
			 $output .= "</table>";


			 $output .= "<br><center><b>CLIENT INFORMATION  GATHERED BY PUMP ATTENDANT ".$FilterClientUser."  !!!!!</b></center><br>";

			 $output .="<center> <table border='1' class='table table-striped table-bordered table-hover table-sm'>";
			 $output .="<thead class='thead-dark'>";
			 $output .= "<tr>";
			 $output .= "<th>No</th>";
			 $output .= "<th>Client Names</th>";
			 $output .= "<th>Pompiste</th>";
			 $output .= "<th>Vehicle Type</th>";
			 $output .= "<th>Plate Number</th>";
			 $output .= "<th>Fuel Type</th>";
			 $output .= "<th>Fuel Price</th>";
			 $output .= "<th>Liters Consumed</th>";
			 $output .= "<th>Status</th>";
			 $output .= "<th>Date</th>";
			 $output .= "<th>Total Amount</th>";
			 $output .= "</tr>";
			 $output .= "</thead>";

			 $no = 0;
			 $totalAmount  = 0;
             $totalUnPaidAmount  = 0;
             $totalPaidMoney  = 0;


			 foreach ($filteDataForUser as $key => $value) {

			 	$totalAmount += $filteDataForUser[$key]['total'];

			 	$no +=1;
			 	$output .="<tr>";
			 	$output .="<td>".$no."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientNames']."</td>";
				$output .="<td>".$filteDataForUser[$key]['doneby']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientvehicleType']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientVehiclePlate']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelConsumed']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelPrice']." RWF</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelLitle']." L</td>";
			 	$output .="<td>".$filteDataForUser[$key]['paymentStatus']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['date']." </td>";
			 	$output .="<td>".$filteDataForUser[$key]['total']." RWF</td>";
			 	$output .="</tr>";

			 }
			 
			  $output .= "<br>";
			  $output .= "<br>";
			  $output .= "<tr>";
			  $output .= "<td colspan='9' align='right'><b>Total Amount :</b></td>";
			  $output .= "<td  align='left'><span class='badge badge-info'>&nbsp;&nbsp;".$totalAmount." RWF &nbsp;&nbsp;</span></td>";
			  $output .= "</tr>";


			  $file_name = 'collectdByUser' . '.pdf';
			  $dompdf  = new Dompdf();
			  $dompdf->loadHtml($output);
			  $dompdf->setPaper('A4','landscape');
			  $dompdf->render();
			  $file = $dompdf->output();
			  $dompdf->stream();
			  file_put_contents($file_name, $file);
		break;		


		case 'reportBasedOnFuelTaken':
			 $FilterByFuels  = @$_GET['fuelName'];
			 $myOwnAccount  = @$_GET['myOwnAccount'];
			 $filteDataForUser  = $spObject->selectFilteredDataBySelectedFuel($FilterByFuels,$myOwnAccount);
		

			 $output  = "";
			 $output .= "<table>";
			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";			 

			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";
			 $output .= "</table>";


			 $output .= "<br><center><b>CLIENT LIST WHO BOUGHT ".$FilterByFuels." FUEL !!!!!</b></center><br>";

			 $output .="<center> <table border='1' class='table table-striped table-bordered table-hover table-sm'>";
			 $output .="<thead class='thead-dark'>";
			 $output .= "<tr>";
			 $output .= "<th>No</th>";
			 $output .= "<th>Client Names</th>";
			 $output .= "<th>Pompiste</th>";
			 $output .= "<th>Vehicle Type</th>";
			 $output .= "<th>Plate Number</th>";
			 $output .= "<th>Fuel Type</th>";
			 $output .= "<th>Fuel Price</th>";
			 $output .= "<th>Liters Consumed</th>";
			 $output .= "<th>Status</th>";
			 $output .= "<th>Date</th>";
			 $output .= "<th>Total Amount</th>";
			 $output .= "</tr>";
			 $output .= "</thead>";

			 $no = 0;
			 $totalAmount  = 0;
             $totalUnPaidAmount  = 0;
             $totalPaidMoney  = 0;


			 foreach ($filteDataForUser as $key => $value) {

			 	$totalAmount += $filteDataForUser[$key]['total'];

			 	$no +=1;
			 	$output .="<tr>";
			 	$output .="<td>".$no."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientNames']."</td>";
				 $output .="<td>".$filteDataForUser[$key]['doneby']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientvehicleType']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientVehiclePlate']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelConsumed']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelPrice']." RWF</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelLitle']." L</td>";
			 	$output .="<td>".$filteDataForUser[$key]['paymentStatus']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['date']." </td>";
			 	$output .="<td>".$filteDataForUser[$key]['total']." RWF</td>";
			 	$output .="</tr>";

			 }
			 
			  $output .= "<br>";
			  $output .= "<br>";
			  $output .= "<tr>";
			  $output .= "<td colspan='9' align='right'><b>Total Amount :</b></td>";
			  $output .= "<td  align='left'><span class='badge badge-info'>&nbsp;&nbsp;".$totalAmount." RWF &nbsp;&nbsp;</span></td>";
			  $output .= "</tr>";
			 // $fileName = $FilterByFuels."-".date('d-m-Y').".xls";
			 // header('Content-Type: application/vnd.ms-excel');
			 // header('Content-Disposition: attachment; filename='.$fileName);
			 // echo $output;
			 // $heading = false;
			 // exit();

			  $file_name = "$FilterByFuels" . '.pdf';
			  $dompdf  = new Dompdf();
			  $dompdf->loadHtml($output);
			  $dompdf->setPaper('A4','landscape');
			  $dompdf->render();
			  $file = $dompdf->output();
			  $dompdf->stream();
			  file_put_contents($file_name, $file);
		break;		



		case 'reportBasedOnPaymentStatus':
			 $FilterByFuels  = @$_GET['paymentMode'];
			 $myOwnAccount  = @$_GET['myOwnAccount'];
			 $filteDataForUser  = $spObject->selectFilteredDataByPaymentStatus($FilterByFuels,$myOwnAccount);
		

			 $output  = "";
			 $output .= "<table>";
			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";			 

			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";
			 $output .= "</table>";


			 $output .= "<br><center><b>CLIENT LIST WHO THERE PAYMENT STATUS IS  ".$FilterByFuels." !!!!!</b></center><br>";

			 $output .="<center> <table border='1' class='table table-striped table-bordered table-hover table-sm'>";
			 $output .="<thead class='thead-dark'>";
			 $output .= "<tr>";
			 $output .= "<th>No</th>";
			 $output .= "<th>Client Names</th>";
			 $output .= "<th>Pompiste</th>";
			 $output .= "<th>Vehicle Type</th>";
			 $output .= "<th>Plate Number</th>";
			 $output .= "<th>Fuel Type</th>";
			 $output .= "<th>Fuel Price</th>";
			 $output .= "<th>Liters Consumed</th>";
			 $output .= "<th>Status</th>";
			 $output .= "<th>Date</th>";
			 $output .= "<th>Total Amount</th>";
			 $output .= "</tr>";
			 $output .= "</thead>";

			 $no = 0;
			 $totalAmount  = 0;
             $totalUnPaidAmount  = 0;
             $totalPaidMoney  = 0;


			 foreach ($filteDataForUser as $key => $value) {

			 	$totalAmount += $filteDataForUser[$key]['total'];

			 	$no +=1;
			 	$output .="<tr>";
			 	$output .="<td>".$no."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientNames']."</td>";
				 $output .="<td>".$filteDataForUser[$key]['doneby']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientvehicleType']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientVehiclePlate']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelConsumed']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelPrice']." RWF</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelLitle']." L</td>";
			 	$output .="<td>".$filteDataForUser[$key]['paymentStatus']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['date']." </td>";
			 	$output .="<td>".$filteDataForUser[$key]['total']." RWF</td>";
			 	$output .="</tr>";

			 }
			 
			  $output .= "<br>";
			  $output .= "<br>";
			  $output .= "<tr>";
			  $output .= "<td colspan='9' align='right'><b>Total Amount :</b></td>";
			  $output .= "<td  align='left'><span class='badge badge-info'>&nbsp;&nbsp;".$totalAmount." RWF &nbsp;&nbsp;</span></td>";
			  $output .= "</tr>";
			 // $fileName = $FilterByFuels."-".date('d-m-Y').".xls";
			 // header('Content-Type: application/vnd.ms-excel');
			 // header('Content-Disposition: attachment; filename='.$fileName);
			 // echo $output;
			 // $heading = false;
			 // exit();


			  $file_name = "$FilterByFuels" . '.pdf';
			  $dompdf  = new Dompdf();
			  $dompdf->loadHtml($output);
			  $dompdf->setPaper('A4','landscape');
			  $dompdf->render();
			  $file = $dompdf->output();
			  $dompdf->stream();
			  file_put_contents($file_name, $file);
		break;		


		case 'reportBasedOnDate':
			 $FilterByFuels  = @$_GET['dateOnAction'];
			 $myOwnAccount  = @$_GET['myOwnAccount'];
			 $filteDataForUser  = $spObject->selectFilteredDataByDatePurchsed($FilterByFuels,$myOwnAccount);
		

			 $output  = "";
			 $output .= "<table>";
			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";			 

			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";
			 $output .= "</table>";


			 $output .= "<br><center><b>CLIENT LIST WHO BAUGHT FUEL ON  ".$FilterByFuels." !!!!!</b></center><br>";

			 $output .="<center> <table border='1' class='table table-striped table-bordered table-hover table-sm'>";
			 $output .="<thead class='thead-dark'>";
			 $output .= "<tr>";
			 $output .= "<th>No</th>";
			 $output .= "<th>Client Names</th>";
			 $output .= "<th>Pompiste</th>";
			 $output .= "<th>Vehicle Type</th>";
			 $output .= "<th>Plate Number</th>";
			 $output .= "<th>Fuel Type</th>";
			 $output .= "<th>Fuel Price</th>";
			 $output .= "<th>Liters Consumed</th>";
			 $output .= "<th>Status</th>";
			 $output .= "<th>Date</th>";
			 $output .= "<th>Total Amount</th>";
			 $output .= "</tr>";
			 $output .= "</thead>";

			 $no = 0;
			 $totalAmount  = 0;
             $totalUnPaidAmount  = 0;
             $totalPaidMoney  = 0;


			 foreach ($filteDataForUser as $key => $value) {

			 	$totalAmount += $filteDataForUser[$key]['total'];

			 	$no +=1;
			 	$output .="<tr>";
			 	$output .="<td>".$no."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientNames']."</td>";
				 $output .="<td>".$filteDataForUser[$key]['doneby']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientvehicleType']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientVehiclePlate']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelConsumed']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelPrice']." RWF</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelLitle']." L</td>";
			 	$output .="<td>".$filteDataForUser[$key]['paymentStatus']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['date']." </td>";
			 	$output .="<td>".$filteDataForUser[$key]['total']." RWF</td>";
			 	$output .="</tr>";

			 }
			 
			  $output .= "<br>";
			  $output .= "<br>";
			  $output .= "<tr>";
			  $output .= "<td colspan='9' align='right'><b>Total Amount :</b></td>";
			  $output .= "<td  align='left'><span class='badge badge-info'>&nbsp;&nbsp;".$totalAmount." RWF &nbsp;&nbsp;</span></td>";
			  $output .= "</tr>";
			 // $fileName = $FilterByFuels."_Client_Lists".".xls";
			 // header('Content-Type: application/vnd.ms-excel');
			 // header('Content-Disposition: attachment; filename='.$fileName);
			 // echo $output;
			 // $heading = false;
			 // exit();

			  $file_name = "$FilterByFuels" . '.pdf';
			  $dompdf  = new Dompdf();
			  $dompdf->loadHtml($output);
			  $dompdf->setPaper('A4','landscape');
			  $dompdf->render();
			  $file = $dompdf->output();
			  $dompdf->stream();
			  file_put_contents($file_name, $file);
		break;		



		case 'reportBasedOnRangeOfDate':
			 $startOnDate  = @$_GET['startOndate'];
			 $endOnDate    = @$_GET['endOfDate'];
			 $myOwnAccount  = @$_GET['myOwnAccount'];
			 $filteDataForUser  = $spObject->selectFilteredRangeOfDate($startOnDate,$endOnDate,$myOwnAccount);
		

			 $output  = "";
			 $output .= "<table>";
			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";			 

			 $output .= "<tr>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "<td>&nbsp;</td>";
			 $output .= "</tr>";
			 $output .= "</table>";


			 $output .= "<br><center><b>CLIENT LIST WHO BAUGHT FUEL ON FROM  ".$startOnDate." Up To ".$endOnDate." !!!!!</b></center><br>";

			 $output .="<center> <table border='1' class='table table-striped table-bordered table-hover table-sm'>";
			 $output .="<thead class='thead-dark'>";
			 $output .= "<tr>";
			 $output .= "<th>No</th>";
			 $output .= "<th>Client Names</th>";
			 $output .= "<th>Pompiste</th>";
			 $output .= "<th>Vehicle Type</th>";
			 $output .= "<th>Plate Number</th>";
			 $output .= "<th>Fuel Type</th>";
			 $output .= "<th>Fuel Price</th>";
			 $output .= "<th>Liters Consumed</th>";
			 $output .= "<th>Status</th>";
			 $output .= "<th>Date</th>";
			 $output .= "<th>Total Amount</th>";
			 $output .= "</tr>";
			 $output .= "</thead>";

			 $no = 0;
			 $totalAmount  = 0;
             $totalUnPaidAmount  = 0;
             $totalPaidMoney  = 0;


			 foreach ($filteDataForUser as $key => $value) {

			 	$totalAmount += $filteDataForUser[$key]['total'];

			 	$no +=1;
			 	$output .="<tr>";
			 	$output .="<td>".$no."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientNames']."</td>";
				 $output .="<td>".$filteDataForUser[$key]['doneby']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientvehicleType']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['clientVehiclePlate']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelConsumed']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelPrice']." RWF</td>";
			 	$output .="<td>".$filteDataForUser[$key]['fuelLitle']." L</td>";
			 	$output .="<td>".$filteDataForUser[$key]['paymentStatus']."</td>";
			 	$output .="<td>".$filteDataForUser[$key]['date']." </td>";
			 	$output .="<td>".$filteDataForUser[$key]['total']." RWF</td>";
			 	$output .="</tr>";

			 }
			 
			  $output .= "<br>";
			  $output .= "<br>";
			  $output .= "<tr>";
			  $output .= "<td colspan='9' align='right'><b>Total Amount :</b></td>";
			  $output .= "<td  align='left'><span class='badge badge-info'>&nbsp;&nbsp;".$totalAmount." RWF &nbsp;&nbsp;</span></td>";
			  $output .= "</tr>";
			  $file_name = 'rangeDate' . '.pdf';
			  $dompdf  = new Dompdf();
			  $dompdf->loadHtml($output);
			  $dompdf->setPaper('A4','landscape');
			  $dompdf->render();
			  $file = $dompdf->output();
			  $dompdf->stream();
			  file_put_contents($file_name, $file);


		break;

		default:
			echo "Fine Brother!!";
		break;
	}
?>