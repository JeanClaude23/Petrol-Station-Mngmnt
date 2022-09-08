<?php
session_start();

if (! isset($_SESSION['pompiste_usernename'])) {
echo "<script>window.alert('Oooops You Must Login First');window.location='../index.html';</script>";
}else{
	include '../spClass.php';
	$spObject  = new  spClass();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Société Pétrolière</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


<!--===============================================================================================-->	
  <link href="../icon/iconSp.jpg" rel="icon">
  <link href="../icon/iconSp.jpg" rel="apple-touch-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://checkout.flutterwave.com/v3.js"></script>
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<!--===============================================================================================-->

<style type="text/css">
	.heroes-Here{
		width: 100%;
  	/*height: 80vh;*/
		background-image: url('../icon/slider.jpg');
		background-size: cover;
  	position: relative;
	}	


	.myFieldSet{
		width: 100%;
  	/*height: 80vh;*/
		background-image: url('../icon/Station.jpg');
		background-size: cover;
  	position: relative;
	}
</style>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">		
		<div class="container-menu-desktop heroes-Here">

			<div class="wrap-menu-desktop how-shadow1 heroes-Here">
			<header id="header" class="fixed-top d-flex align-items-center ">
		    <div class="container">
		      <div class="header-container d-flex align-items-center">
		        <div class="logo mr-auto">
		          <h1 class="text-light">  <a href="#"><span><b style="color: skyblue;text-shadow: 1px 1px #ffffff;">Société</b> <b style="color: yellow;text-shadow: 1px 1px #000;">Pétrolière</b> (<b style="color: skyblue;text-shadow: 1px 1px #ffffff;">S</b><b  style="color: yellow;text-shadow: 1px 1px #000;">P</b>)</span></a></h1>
		        </div>

		        <nav class="nav-menu d-none d-lg-block">
		          <ul>
		            
		            <li class="active"><a href="userDashboard.php"> <i class="fa fa-home"></i> Home</a></li>
		            <li class="active"><a href="userDashboard.php?brilliant=viewClient"> <img src="../icon/addClient.ico" style="width: 18px;height: 18px;"> Serve Client</a></li>
		            <li class="active"><a href="userDashboard.php?brilliant=viewFuelInTank"> <img src="../icon/iconFuel.jpg" style="width: 18px;height: 18px;"> Fuel's Tank</a></li>
		            

		            <li class="active"><a href="userDashboard.php?brilliant=viewUserInformation"> <i class="fa fa-user-circle-o"></i> My Profile</a></li>
		             
		          </ul>
		        </nav>
		      </div>
		    </div>
		  </header>
		  </div>
		</div>
	</header>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">

		<div class="container-fluid">
			<div class="row">

				<div class="col-md-2">


		             <ul class="list-group list-group-unbordered" style="box-shadow: 1px 1px 1px 1px black;border-radius:">

		             <li class="list-group-item"><center><h4><b>PUMP ATTENDANT</b></h4></center><div class="mb-3"></div> <img src="../icon/pompiste.jpg" class="img img-thumbnail img-responsive"  style="border-radius: 1000px; box-shadow:1px 1px 1px 1px black;"></li>


                 <li class="list-group-item">
                 		<center><a href="../spHundler.php?brilliant=trashOut" class="btn btn-info" style="text-decoration: none;"><i class="fa fa-sign-out" style="font-size: 25;"></i> <b style="font-size: 18px;" class="text text-white"> Logout</b></a></center>
                 </li>  

		             </ul>
				</div>
				<div class="col-md-8">
					<?php
						switch (@$_GET['brilliant']) {
							case 'viewClient':
							?>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-11">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><i class="icofont-paperclip" style="font-size: 30px;"></i>  TO DAY <?php echo date("d-m-Y") ?> CLIENT LIST</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>

                      <div class="row">
                      	<div class="col-md-3"></div>
                      	<div class="col-md-6">
                      		<?php echo (@$_GET['status'] == "cientAdded") ? "<div class='mb-2'></div><div class='alert alert-success animated shake' id='sams1' style='height:45px;'><center><i><b>Client Has Been &nbsp; <i class='fa fa-save'></i> &nbsp;&nbsp;Saved  Successfull !!</b></i></center> </div> ":"" ?>


                      		<?php echo (@$_GET['status'] == "cientAddedWithLowerTank") ? "<div class='mb-2'></div><div class='alert alert-warning animated shake' id='sams1' style='height:45px;'><center><i><b>Client Has Been &nbsp; <i class='fa fa-save'></i> &nbsp;&nbsp;Saved  Successfull, But Tank Goes Below 20 % Of Remaning!!</b></i></center> </div> ":"" ?>

                      		<?php echo (@$_GET['status'] == "clientInfoUpdated") ? "<div class='mb-2'></div><div class='alert alert-info animated shake' id='sams1' style='height:45px;'><center><i><b>Client Info Has Been &nbsp; <i class='icofont-pencil-alt-5'></i> &nbsp;&nbsp;Modified   Successfull !!</b></i></center> </div> ":"" ?>

                      		<?php echo (@$_GET['status'] == "clientTrashed") ? "<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b>Client Info Has Been &nbsp; <i class='icofont-trash '></i> &nbsp;&nbsp;Deleted  !!</b></i></center> </div>":"" ?>

                      		<?php echo (@$_GET['status'] == "paymentApproved") ? "<div class='mb-2'></div><div class='alert alert-success animated shake' id='sams1' style='height:45px;'><center><i><b>Woooow Payment Has Been Approved</b></i></center> </div>":"" ?>
                      	</div>
                      	<div class="col-md-3"></div>
                      </div>              

                      <div class="row">
                      	<div class="col-md-3"><a href="userDashboard.php?brilliant=selectAllTransactionYouMake" class="btn btn-link"> <i class="icofont-history" style="font-size: 20px;"></i> Check Recent</a></div>
                      	<div class="col-md-6">
                      		<center><a href="userDashboard.php?brilliant=AddNewClient" class="btn btn-info"><i class="fa fa-plus"></i><i class="fa fa-user"></i> &nbsp;Add New Client</a></center><div class="mb-2"></div>
                      	</div>
                      	<div class="col-md-3"></div>
                      </div>

                      



                      <table class="table table-bordered table-sm table-hover table-striped">
                      	<thead class="bg-dark text text-white">
                      		<tr>
	                      		<th>N<sup>o</sup></th>
	                      		<th>Client Name</th>
	                      		<th>Vehicle Type</th>
	                      		<th>Plate Number</th>
	                      		<th>Fuel Type</th>
	                      		<th>Consumed Liters</th>
	                      		<th>Payment Status</th>
	                      		<th>Action</th>
	                      	<tr>
                      	</thead>

                      	<?php 
                      		if($spObject->checkIfWhereThereIsAnyClientFor2day(date("Y-m-d"),$_SESSION['pompiste_usernename']) > 0){
                      			$dataForClient = $spObject->tryToAccessClientListFor2Days(date("Y-m-d"),$_SESSION['pompiste_usernename']);
                      			$id  = 0;
                      			foreach ($dataForClient as $key => $value) {
                      			$id +=1;
                      			?>
                      				<tr>
                      					<td><?php echo $id ?></td>
                      					<td><?php echo $dataForClient[$key]['clientNames'] ?></td>
                      					<td><?php echo $dataForClient[$key]['clientvehicleType'] ?></td>
                      					<td><?php echo $dataForClient[$key]['clientVehiclePlate'] ?></td>
                      					<td><?php echo $dataForClient[$key]['fuelConsumed'] ?></td>
                      					<td><?php echo $dataForClient[$key]['fuelLitle'] ?>L</td>
                      					<td><?php 

                      					if($dataForClient[$key]['paymentStatus'] == "no_payment"){
                      					?>
                      							<span class="badge badge-danger">Not Yet</span>
                      					<?php
                      					}else{
                      					?>
                      							<span class="badge badge-success">Payment Approved</span>
                      					<?php
                      					}
                      					?></td>
                      					<td><a href="userDashboard.php?brilliant=viewFullInfoAboutClient&clientId=<?php echo $dataForClient[$key]['clientld'] ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></td>
                      				</tr>
                      			<?php
                      			}
                      		}else{
                      		?>
                      			<tr>
                      				<td colspan="8"><center><b class="text text-danger">No Client List For 2 day</b></center></td>
                      			</tr>
                      		<?php
                      		}
                      	?>
                      </table>

										</div>
									</div>
									<!-- <div class="col-sm-1"></div> -->
								</div>
							<?php
							break;

							case 'viewFullInfoAboutClient':
							$singleClientData  = $spObject->tryToAccessInformationOfSingleClient(@$_GET['clientId']);
							?>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-11">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
												

												<div class="row">
													<div class="col-md-3"></div>
													<div class="col-md-6">
														<center>	<?php echo (@$_GET['status'] == "ooopsNoMoney") ? "<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b>Ooops No Enough Money On Your Momo Wallet</b></i></center> </div> ":"" ?></center>
													</div>
													<div class="col-md-3"></div>
												</div>

												<br>
											<div class="row">
												<div class="col-md-4">


													<fieldset class="p-2" style="border: 1px solid #337ab7;">
														<legend> &nbsp;&nbsp;<b style="color: #e96b56;"><i class="icofont-steering" style="font-size: 30px;"></i> Driver Information</b></legend>

														<table class="table table-bordered table-sm table-hover table-striped">
															
															<tr>
																<th><i class="fa fa-user-circle-o"></i> Client Name : </th>
																<td><?php echo $singleClientData[0]['clientNames'] ?></td>
															</tr>

															<tr>
																<th><i class="icofont-iphone" style="font-size: 20px;"></i> Client Phone : </th>
																<td><?php echo $singleClientData[0]['clientPhone'] ?></td>
															</tr>
														</table>
													</fieldset><div class="mb-5"></div>



													<fieldset class="p-2 myFieldSet" style="border: 1px solid #337ab7;">
														<legend> &nbsp;&nbsp;<b style="color: #e96b56;"><i class="icofont-car-alt-1" style="font-size: 30px;"></i> Vehicle Information</b></legend>

														<table class="table table-bordered table-sm table-hover table-striped">
															
															<tr>
																<th><center><i class="fa fa-hand-o-right" style="font-size: 25px"></i></center> </th>
																<td><?php 

																if($singleClientData[0]['clientvehicleType']  == "Car"){
																?>
																	<i class="icofont-police-car-alt-1" style="font-size: 40px;"></i>
																<?php
																}else if($singleClientData[0]['clientvehicleType']  == "Motorcycle"){
																?>
																	<i class="fa fa-motorcycle" style="font-size: 40px;"></i>
																<?php
																}
																?>
															</td>
															</tr>	
															<tr>
																<th><i class="fa fa-user-circle-o"></i> Vehicle Type : </th>
																<td><?php echo $singleClientData[0]['clientvehicleType'] ?></td>
															</tr>

															<tr>
																<th><i class="icofont-iphone" style="font-size: 20px;"></i> <?php echo $singleClientData[0]['clientvehicleType'] ?> Plate Number: </th>
																<td><?php echo $singleClientData[0]['clientVehiclePlate'] ?></td>
															</tr>
														</table>

													</fieldset><div class="mb-1"></div>

												</div>
												<div class="col-md-5">
													

													<fieldset class="p-2 myFieldSet" style="border: 1px solid #337ab7;">
														<legend> &nbsp;&nbsp;<b style="color: #e96b56;"><img src="../icon/iconFuel.jpg" style="width: 50px;height: 55px;"> Fuels Information</b></legend>

														<table class="table table-bordered table-sm table-hover table-striped">
															
															<tr>
																<th><?php echo ($singleClientData[0]['clientvehicleType']  == "Car") ? "<i class='icofont-police-car-alt-1'></i>":"<i class='fa fa-motorcycle'></i>" ?>  Fuel Consumed : </th>
																<td><?php echo $singleClientData[0]['fuelConsumed'] ?></td>
															</tr>

															<tr>
																<th><i class="fa fa-balance-scale" style="font-size: 20px;"></i>  Liter Consumed: </th>
																<td><?php echo $singleClientData[0]['fuelLitle'] ?> L</td>
															</tr>

															<tr>
																<th><i class="icofont-price" style="font-size: 20px;"></i> Unit Price : </th>
																<td><?php echo $singleClientData[0]['fuelPrice'] ?> RWF</td>
															</tr>


															<tr>
																<th><i class="fa fa-money" style="font-size: 20px;"></i> Total Price : </th>
																<td><?php echo $singleClientData[0]['total'] ?> RWF</td>
															</tr>															


															<tr>
																<th><i class="icofont-money-bag" style="font-size: 20px;"></i> Payment Status : </th>
																<td><?php 
																if($singleClientData[0]['paymentStatus'] == "no_payment"){
																?>
																	<span class="badge badge-danger"> Not Yet</span>
																<?php
																}else{
																?>
																	<span class="badge badge-success">Payment Accepted</span>
																<?php
																} 

															?> </td>
															</tr>
														</table> <div class="mb-5"></div>


														<table class="table table-bordered table-sm table-hover table-striped">
															
															<tr>
																<th><i class="fa fa-home" style="font-size: 20px;">  <b style="color: skyblue;text-shadow: 1px 1px #ffffff;">S</b><b  style="color: yellow;text-shadow: 1px 1px #000;">P</b>  Branch : </th>
																<td><?php echo $singleClientData[0]['spBranch'] ?></td>
															</tr>

															<tr>
																<th><i class="fa fa-user-secret" style="font-size: 20px;"></i>  Pump Attendant: </th>
																<td><?php echo $singleClientData[0]['doneby'] ?> </td>
															</tr>

															<tr>
																<th><i class="icofont-user-suited" style="font-size: 20px;"></i> <b style="color: skyblue;text-shadow: 1px 1px #ffffff;">S</b><b  style="color: yellow;text-shadow: 1px 1px #000;">P</b>  Supervisor : </th>
																<td><?php echo $singleClientData[0]['supervisorAccount'] ?> </td>
															</tr>


															<tr>
																<th><i class="fa fa-calendar" style="font-size: 20px;"></i> Done On : </th>
																<td><?php echo $singleClientData[0]['date'] ?> </td>
															</tr>
														</table>
													</fieldset>
												</div>
												<div class="col-md-3">


													<fieldset class="p-2 myFieldSet" style="border: 1px solid #337ab7;">
														<legend> &nbsp;&nbsp;<b style="color: #e96b56;"><i class="icofont-binoculars" style="font-size: 30px;"></i> Make Action</b></legend>


															<?php

																if ($singleClientData[0]['paymentStatus'] == "payment_approved") {
																?>
																	<i class="icofont-money-bag fa-3x success"></i><b class=" badge-pill badge-success" style="font-size: 23px;">APPROVED</b>
																<?php
																}else{
																?>
																	<table class="table table-bordered table-hover table-sm">
																		<tr>

																			<th><a href="../spHundler.php?brilliant=deleteClient&clientId=<?php echo $singleClientData[0]['clientld'] ?>"><button class="btn btn-danger btn-block" onclick="return window.confirm('Are You Sure You Want To Delete Selected Client')"><i class="icofont-trash"></i> Delete</button></a></th>
																			<th><a href="userDashboard.php?brilliant=modifyClientAction&clientId=<?php echo $singleClientData[0]['clientld'] ?>" class="btn btn-info btn-block"><i class="icofont-pencil-alt-2"></i> Modify</a></th>
																		</tr>
																	</table><div class="mb-5"></div>

																	<input type="hidden" class="form-control clientName"  value="<?php echo $singleClientData[0]['clientNames'] ?>">

																	<input type="hidden" class="form-control clientPhone"  value="<?php echo $singleClientData[0]['clientPhone'] ?>">

																	<input type="hidden" class="form-control amountToBePayed"  value="<?php echo $singleClientData[0]['total'] ?>">

																	<input type="hidden" class="form-control clientId"  value="<?php echo $singleClientData[0]['clientld'] ?>">

																	<button class="btn btn-success btn-block btn-ginnova-hub-money">Get Pay  100 
																		<!-- <?php echo $singleClientData[0]['total'] ?> --> RWF</button>
																<?php
																}
															 ?>

															


													</fieldset>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-0"></div>
								</div>
							<?php	
							break;

							case 'AddNewClient':
							?>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-9">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><i class="icofont-save" style="font-size: 30px;"></i>  Add New Client To Add</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>

                      <div class="row">
                      	<div class="col-md-3"></div>
                      	<div class="col-md-6">

                      		<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                      			</div>
                      			<input type="text" class="form-control cFullName" placeholder="Enter Full Name">
                      		</div><div class="mb-2"><span class="cFullName-message"></span></div>

                      		<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="fa fa-phone"></i></span>
                      			</div>
                      			<input type="text" class="form-control cPhone" placeholder="Enter Client Phone">
                      		</div><div class="mb-2"><span class="cPhone-message"></span></div>	


                      		<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      			</div>
                      			<input type="text" class="form-control cEmail" placeholder="Enter Client Email">
                      		</div><div class="mb-2"><span class="cEmail-message"></span></div>

                      		<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="icofont-steering"></i></span>
                      			</div>
                      			<select class="form-control cVehicle">
                      				<option>Select Client Vehicle</option>
                      				<option>Car</option>
                      				<option>Motorcycle</option>
                      			</select>
                      		</div><div class="mb-2"><span class="cVehicle-message"></span></div>	


                      		<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="icofont-car-alt-3"></i></span>
                      			</div>
                      			<input type="text" class="form-control cPlateNumber" placeholder="Enter Client's Vehicle Plate Number">
                      		</div><div class="mb-2"><span class="cPlateNumber-message"></span></div>

                      		<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="fa fa-thermometer-three-quarters "></i></span>
                      			</div>

                      			<?php
                      				$data  = $spObject->selectAllInformationForPumpAttendant($_SESSION['pompiste_usernename']);

                      				$fuelStock  = $spObject->tryToAccessfuelInTheStock($data[0]['SupervisedBy']);
                      			 ?>
                      			<select class="form-control cConsumedFuel">
                      				<option>Select Fuel Consumed</option>
                      				<?php 
                      				foreach ($fuelStock as $key => $value) {
                      				?>
                      					<option><?php echo $fuelStock[$key]['flName']?></option>
                      				<?php
                      				}
                      				?>
                      			</select>
                      		</div><div class="mb-2"><span class="cConsumedFuel-message"></span></div>
                      		<div class="fuelInfo"></div>

                     		 	</div>

                      	<div class="col-md-3"></div>
                      </div>

										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
							<?php
							break;

							case 'selectAllTransactionYouMake':
							error_reporting(0);
							?>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-11">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><i class="icofont-paper" style="font-size: 30px;"></i>  All  Transaction(History) You Make</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>


                      <table class="table table-bordered table-hover table-sm">
                      	<thead class="bg-info">
                      		<tr>
                      			<th>N <sup>o</sup></th>
                      			<th>Client Name</th>
                      			<th>Vehicle Type</th>
                      			<th>Plate Number</th>
                      			<th>Fuel Type</th>
                      			<th>Consumed Liters </th>
                      			<th>Payment Status</th>
                      			<th>Date</th>
                      			<th>View</th>
                      		</tr>
                      	</thead>

                      	<?php 
                      	 $recentData  = $spObject->tryToAccessClientRecentListoForOurClient($_SESSION['pompiste_usernename']);
                      	 $id  = 0;

                      	 foreach ($recentData as $key => $value) {
                      
                      	 ?>
                      			 	<tr>
                      					<td><?php echo $recentData[$key]['clientld'] ?></td>
                      					<td><?php echo $recentData[$key]['clientNames'] ?></td>
                      					<td><?php echo $recentData[$key]['clientvehicleType'] ?></td>
                      					<td><?php echo $recentData[$key]['clientVehiclePlate'] ?></td>
                      					<td><?php echo $recentData[$key]['fuelConsumed'] ?></td>
                      					<td><?php echo $recentData[$key]['fuelLitle'] ?>L</td>
                      					<td><?php echo $recentData[$key]['paymentStatus'] ?></td>
                      					<td><?php echo $recentData[$key]['date'] ?></td>
                      					<td><a href="userDashboard.php?brilliant=viewFullInfoAboutClient&clientId=<?php echo $recentData[$key]['clientld'] ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></td>
                      				</tr>
                      	 <?php
                      	 }

                      	?>
                      </table>
										</div>
									</div>
									<div class="col-md-0"></div>
								</div>
							<?php
							break;

							case 'modifyClientAction':
							$dataForClient  = $spObject->tryToAccessInformationOfSingleClient(@$_GET['clientId']);

							?>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-11">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><i class="icofont-pencil-alt-5" style="font-size: 30px;"></i> Modify Client Info</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>

                      <div class="row">
                      	<div class="col-md-5">
                      		 <fieldset class="p-2" style="border: 1px solid #337ab7;">
														<legend> &nbsp;&nbsp;<b class="text text-info"><i class="icofont-user-suited" style="font-size: 30px;"></i> Client Information</b></legend>

														<div class="input-group">
	                      			<div class="input-group-prepend">
	                      				<span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
	                      			</div>
	                      			<input type="text" class="form-control cFullName" value="<?php echo $dataForClient[0]['clientNames'] ?>">
                      			</div><div class="mb-2"><span class="cFullName-message"></span></div>	


                      			<div class="input-group">
	                      			<div class="input-group-prepend">
	                      				<span class="input-group-text"><i class="fa fa-phone"></i></span>
	                      			</div>
	                      			<input type="text" class="form-control cPhone" value="<?php echo $dataForClient[0]['clientPhone'] ?>">
                      			</div><div class="mb-2"><span class="cPhone-message"></span></div>

	                      		<div class="input-group">
	                      			<div class="input-group-prepend">
	                      				<span class="input-group-text"><i class="icofont-steering"></i></span>
	                      			</div>
	                      			<select class="form-control cVehicle">
	                      				<option <?php echo ( (@$_GET['clientId']) && (  $dataForClient[0]['clientvehicleType']== "Car")) ? "selected":"" ?>>Car</option>
	                      				<option <?php echo ( (@$_GET['clientId']) && (  $dataForClient[0]['clientvehicleType']== "Motorcycle")) ? "selected":"" ?>>Motorcycle</option>
	                      			</select>
	                      		</div><div class="mb-2"><span class="cVehicle-message"></span></div>

		                      	<div class="input-group">
	                      			<div class="input-group-prepend">
	                      				<span class="input-group-text"><i class="icofont-car-alt-3"></i></span>
	                      			</div>
	                      			<input type="text" class="form-control cPlateNumber" value="<?php echo $dataForClient[0]['clientVehiclePlate'] ?>">
	                      		</div><div class="mb-2"><span class="cPlateNumber-message"></span></div>


													 </fieldset>
                      	</div>
                      	<div class="col-md-1"></div>
                      	<div class="col-md-5">
                      		
                      		<fieldset class="p-2" style="border: 1px solid #337ab7;">
														<legend> &nbsp;&nbsp;<b class="text text-info"><img src="../icon/iconFuel.jpg" style="width: 50px;height: 55px;"> About Fuel</b></legend>

													<div class="input-group">
                      			<div class="input-group-prepend">
                      				<span class="input-group-text"><i class="fa fa-thermometer-three-quarters "></i></span>
                      			</div>
                      			<select class="form-control cConsumedFuelMod">
                      				<option <?php echo ( (@$_GET['clientId']) && ($dataForClient[0]['fuelConsumed']== "Premium")) ? "selected":"" ?>>Premium</option>
                      				<option <?php echo ( (@$_GET['clientId']) && ($dataForClient[0]['fuelConsumed']== "Kerosene")) ? "selected":"" ?>>Kerosene</option>	
                      				<option <?php echo ( (@$_GET['clientId']) && ($dataForClient[0]['fuelConsumed']== "Diesel")) ? "selected":"" ?>>Diesel</option>
                      			</select>
                      		</div><div class="mb-2"><span class="cConsumedFuel-message"></span></div>
                      		<input type="hidden"  class="form-control bookedId" value="<?php echo @$_GET['clientId'] ?>">
                      		<div class="fuelMod"></div>

													 </fieldset>
                      	</div>
                      	<div class="col-md-1"></div>
                      </div>

                     
                    </div>
                  </div>
                  <div class="col-md-0"></div>
                </div>

							<?php
							break;


							case 'viewInTank':
							?>

								 <div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> Fuel in the  tank</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>

                      <div class="row">
                      	<div class="col-md-2"></div>
                      	<div class="col-md-8">

                      		 	<?php echo (@$_GET['status'] == "fuelMarkedAsSell") ? "<div class='mb-2'></div><div class='alert alert-success animated shake' id='sams1' style='height:45px;'><center><i><b> Dear ".$_SESSION['pompiste_usernename']." Successfully You Have Marked Fuel ".@$_GET['fuelName']." </b></i></center> </div> ":"" ?>	

                            <?php echo (@$_GET['status'] == "ooopNotSellAnythin") ? "<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b> Dear ".$_SESSION['pompiste_usernename']." To Day You Didn't Sell Anthing About ".@$_GET['fuelName']." Fuel</b></i></center> </div> ":"" ?> 


                            <?php echo (@$_GET['status'] == "alreadyRemarket") ? "<div class='mb-2'></div><div class='alert alert-warning animated shake' id='sams1' style='height:45px;'><center><i><b> Dear ".$_SESSION['pompiste_usernename']." You Can't Remarked Twice Fuel Named ".@$_GET['fuelName']."</b></i></center> </div> ":"" ?>


                      		<table class="table table-bordered table-hover table-sm table-striped">
                      			<thead class="bg-info text-white">
															<tr>
																<th>N<sup>o</sup></th>
																<th>Fuel Name</th>
																<th>Remaining Quantity</th>
																<th>Fuel Price</th>
																<th>Fuel Status</th>
																<th>Action</th>
															</tr>                      				
                      			</thead>

                      			<?php

                      				$data  = $spObject->tryToAccessFuelTank();

                      				foreach ($data as $key => $value) {
                      				?>
                      					<tr>
                      						<td><?php echo $data[$key]['flId'] ?></td>
                      						<td><?php echo $data[$key]['flName'] ?></td>
                      						<td><?php echo $data[$key]['flRemaining'] ?> L</td>
                      						<td><?php echo $data[$key]['flUnitPrice'] ?> RWF</td>
                      						<td><?php echo $data[$key]['flStatus'] ?></td>
                      						<td><a href="../spHundler.php?brilliant=addRemainingFuel&fuelName=<?php echo $data[$key]['flName']?>&clientAccount=<?php echo $_SESSION['pompiste_usernename'] ?>&fuelRemainingQuantity=<?php echo $data[$key]['flRemaining'] ?>" class="btn btn-info btn-sm"><i class="icofont-hand-drawn-right" style="font-size: 25px;"></i></a></td>
                      					</tr>
                      				<?php
                      				}
                      			 ?>
                      		</table>


                      		<center><div class="row">

                      			<div class="col-6">
                      					<a href="userDashboard.php?brilliant=viewMarked" class="btn btn-success"> <i class="fa fa-eye"></i> To Day Remarked</a>
                      			</div>

                      			<div class="col-6">
                      				<a href="userDashboard.php?brilliant=viewOtherMarked" class="btn btn-info"> <i class="fa fa-eye"></i> View Yesterday  Others Remaining</a>
                      			</div>
                      		</div><center>

                      	</div>
                      	<div class="col-md-2"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>

							<?php
							break;

							case 'viewMarked':
							$toDayDate = date("d-m-Y");
							// $yesrdayDate  = date('d-m-Y', strtotime("0 days"));
							$premiumFuel  = $spObject->selectPremiumFuelLeftedInTheTankYestraday($toDayDate,$_SESSION['pompiste_usernename']);

							$dieselFuel  = $spObject->selectDieselFuelLeftedInTheTankYestraday($toDayDate,$_SESSION['pompiste_usernename']);

							$keroseneFuel  = $spObject->selectKeroseneFuelLeftedInTheTankYestraday($toDayDate,$_SESSION['pompiste_usernename']);
							
							?>
								<div class="row">
								 <div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b  class="text text-warning"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> Fuel That Remarked  To Day on <?php echo $toDayDate ?></b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>


                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-10">
	                      		<div class="section-title">
	                          <h3 style="font-size: 23px;">
	                              <center>
	                                <b  class="text text-info"> <i class="fa fa-eye"></i> Premium Fuel Left In Then Tank</b>

	                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
	                             </center> 
	                          </h3>
	                           <table class="table table-bordered table-hover table-striped table-sm">
	                      			<thead class="bg-dark text text-white">
	                      				<tr>
	                      					<th>No</th>
	                      					<th>Fuel Name</th>
	                      					<th>Remain Liter</th>
	                      					<th>date</th>
	                      					<th>Amount</th>
	                      				</tr>
	                      			</thead>

	                      			<?php 
	                      			  $no = 0;
	                      				foreach ($premiumFuel as $key => $value) {
	                      				$no +=1;
	                      			?>
	                      				<tr>
	                      					<td><?php echo $no  ?></td>
	                      					<td><?php echo $premiumFuel[0]['fuelName'] ?></td>
	                      					<td><?php echo $premiumFuel[0]['Quantity'] ?> L</td>
	                      					<td><?php echo $premiumFuel[0]['date'] ?></td>
	                      					<td><?php echo $premiumFuel[0]['totalAmount'] ?> RWF</td>
	                      				</tr>

	                      			<?php
	                      				}
	                      			?>
	                      		 </table>

	                      		</div>
                      	</div>
                      	<div class="col-md-1"></div>
                      </div><div class="mb-5"></div>                     


                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-10">
                      	 <div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b  class="text text-info"> <i class="fa fa-eye"></i> Kerosene Fuel Left In Then Tank</b>

                             </center> 
                          </h3><div class="mb-2"></div>

                          <table class="table table-bordered table-hover table-striped table-sm">
                      			<thead class="bg-dark text text-white">
                      				<tr>
                      					<th>No</th>
                      					<th>Fuel Name</th>
                      					<th>Remain Liter</th>
                      					<th>Date</th>
                      					<th>Amount</th>
                      				</tr>
                      			</thead>

                      				<?php 
	                      			  $no = 0;
	                      				foreach ($keroseneFuel as $key => $value) {
	                      				$no +=1;
	                      			?>
	                      				<tr>
	                      					<td><?php echo $no  ?></td>
	                      					<td><?php echo $keroseneFuel[0]['fuelName'] ?></td>
	                      					<td><?php echo $keroseneFuel[0]['Quantity'] ?> L</td>
	                      					<td><?php echo $keroseneFuel[0]['date'] ?></td>
	                      					<td><?php echo $keroseneFuel[0]['totalAmount'] ?> RWF</td>
	                      				</tr>

	                      			<?php
	                      				}
	                      			?>
                      		</table>
                      		</div>
                      	</div>
                      	<div class="col-md-1"></div>
                      </div><div class="mb-5"></div>      



                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-10">
                      		<div class="section-title">
	                          <h3 style="font-size: 23px;">
	                              <center>
	                                <b  class="text text-info"> <i class="fa fa-eye"></i> Diesel Fuel Left In Then Tank</b>

	                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
	                             </center> 
	                          </h3>
	                           <table class="table table-bordered table-hover table-striped table-sm">
		                      			<thead class="bg-dark text text-white">
		                      				<tr>
		                      					<th>No</th>
		                      					<th>Fuel Name</th>
		                      					<th>Remain Liter</th>
		                      					<th>Date</th>
		                      					<th>Amount</th>
		                      				</tr>
		                      			</thead>
		                      		

		                      		<?php 
	                      			  $no = 0;
	                      				foreach ($dieselFuel as $key => $value) {
	                      				$no +=1;
	                      			?>
	                      				<tr>
	                      					<td><?php echo $no  ?></td>
	                      					<td><?php echo $dieselFuel[0]['fuelName'] ?></td>
	                      					<td><?php echo $dieselFuel[0]['Quantity'] ?> L</td>
	                      					<td><?php echo $dieselFuel[0]['date'] ?></td>
	                      					<td><?php echo $dieselFuel[0]['totalAmount'] ?> RWF</td>
	                      				</tr>

	                      			<?php
	                      				}
	                      			?>
	                      			</table>

                      		</div>
                      	</div>
                      	<div class="col-md-1"></div>
                      </div>                      

 
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
							<?php
							break;


							case 'viewOtherMarked':
							$toDayDate = date("d-m-Y");
							$yesrdayDate  = date('d-m-Y', strtotime("-1 days"));
							$otherFuelzRemained  = $spObject->selectAllFuelRemarkedByOuAndOther($yesrdayDate);
							
							?>
								<div class="row">
								 <div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> View Others Remained Fuel Yesterday <?php echo $yesrdayDate ?></b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>


                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-10">
	                      		<div class="section-title">
	                          
	                           <table class="table table-bordered table-hover table-striped table-sm">
	                      			<thead class="bg-dark text text-white">
	                      				<tr>
	                      					<th>No</th>
	                      					<th>Fuel Name</th>
	                      					<th>Remain Liter</th>
	                      					<th>date</th>
	                      					<th>Amount</th>
	                      					<th>User</th>
	                      				</tr>
	                      			</thead>

	                      			<?php 
	                      			  $no = 0;
	                      				foreach ($otherFuelzRemained as $key => $value) {
	                      				$no +=1;
	                      			?>
	                      				<tr>
	                      					<td><?php echo $no  ?></td>
	                      					<td><?php echo $otherFuelzRemained[$key]['fuelName'] ?></td>
	                      					<td><?php echo $otherFuelzRemained[$key]['Quantity'] ?> L</td>
	                      					<td><?php echo $otherFuelzRemained[$key]['date'] ?></td>
	                      					<td><?php echo $otherFuelzRemained[$key]['totalAmount'] ?> RWF</td>
	                      					<td><?php echo $otherFuelzRemained[$key]['user'] ?></td>
	                      				</tr>

	                      			<?php
	                      				}
	                      			?>
	                      		 </table>

	                      		</div>
                      	</div>
                      	<div class="col-md-1"></div>
                      </div><div class="mb-5"></div>                                         
 
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
							<?php
							break;

							case 'viewUserInformation':
							$dataForPompist  = $spObject->selectAllInformationForPumpAttendant($_SESSION['pompiste_usernename']);
							?>
								<div class="row">
								 <div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><i class="fa fa-user-circle-o fa-2px"></i> Information About You <?php echo $_SESSION['pompiste_usernename'] ?></b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>


                          <div class="row">
                          	<div class="col-md-3"></div>
                          	<div class="col-md-6">

                          		<fieldset  class=" border p-2">
                          			<legend><b class="text text-info"> User Info</b></legend>
                          			<table class="table table-bordered table-striped table-sm table-hover">

		                          	<tr>
		                          		<th><i class="fa fa-user-circle-o"></i>  User Full Name</th>
		                          		<td><?php echo $dataForPompist[0]['userfullNames'] ?></td>
		                          	</tr>	

		                          	<tr>
		                          		<th><i class="fa fa-phone"></i>  User Phone</th>
		                          		<td><?php echo $dataForPompist[0]['userPhone'] ?></td>
		                          	</tr>

		                          	<tr>
		                          		<th><i class="fa fa-user-secret"></i>  Sytem Username</th>
		                          		<td><?php echo $dataForPompist[0]['userName'] ?></td>
		                          	</tr>

		                          	<tr>
		                          		<th><i class="icofont-user-suited"></i>  Who You Are</th>
		                          		<td><?php echo $dataForPompist[0]['userRole'] ?> <b class="text text-danger">Only</b></td>
		                          	</tr>	

		                          	<tr>
		                          		<th><i class="icofont-user-suited"></i> Supervised By</th>
		                          		<td><?php echo $dataForPompist[0]['SupervisedBy'] ?></td>
		                          	</tr>		                          	

		                          	<tr>
		                          		<th><i class="icofont-calendar"></i> Created At</th>
		                          		<td><?php echo $dataForPompist[0]['date'] ?></td>
		                          	</tr>
	                          	
	                          	</table>
                          		</fieldset>
                          	
	                          	

                          	</div>
                          	<div class="col-md-3"></div>
                          </div>

                          
                      </div><div class="mb-3"></div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>


							<?php
							break;
							
							default:
							?>
			
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
										<center>
												<img src="../icon/sp_rwanda.jpg" class="" style="width: 80%; height: 80%;">
											</center>
										</div>
									
							<?php
							break;
						}
					 ?>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</section>	
	
		

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Fuel Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Premium
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Kerosene
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Diesel
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Petroleum
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Sell 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Return
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in An Sp Station , Kigali , Rwanda, Kanombe District or call us on (+250) 780258460
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="managersprw@gmail.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					<b class="text text-white">&copy; Copyright</b> <strong><span><b style="color: skyblue;text-shadow: 1px 1px #ffffff;">Société</b> <b style="color: yellow;text-shadow: 1px 1px #000;">Pétrolière</b> (<b style="color: skyblue;text-shadow: 1px 1px #ffffff;">S</b><b  style="color: yellow;text-shadow: 1px 1px #000;">P</b>)</span></strong>. <b class="text text-white">All Rights Reserved<b/> <div class="mb-2"></div> <center>Designed by <a href="http://sp.co.rw/" target="_blank">JC MISIGARO</a></center>

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../assets/vendor/jquery/jquery.min.money.js"></script>
	<script src="../assets/js/spJsHundler.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

	<script>
		$(document).ready(function(){
			window.setTimeout(function() {
			$("#sams1").fadeTo(3000, 0).slideUp(3000, function(){
			$(this).remove(); 
			});
			}, 3500);
		});
	</script>	


	<script>
		$(document).ready(function(){
			function modifyClientInfoSteps(){
				$(".cConsumedFuelMod").on("change",function(){
						let fuelGetConsumed  = $(this).val();
						let bookedId  = $(".bookedId").val();

						$.ajax({
							method : "POST",
							url : "../spHundler.php?brilliant=fetchAllDataRegardingToTheFuelWhileUpdating",
							data : {
								fuelGetConsumed : fuelGetConsumed,
								bookedId : bookedId
							},
							success : function(response){
								$(".fuelMod").html(response);
							}
						});
					});
				}
			modifyClientInfoSteps();
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<style type="text/css">
	.text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-left: 20px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

.panel {
  /* for text on pannel */
  margin-top: 27px !important;
}

.panel-body {
  padding-top: 30px !important;
}
</style>
<?php	
}
?>