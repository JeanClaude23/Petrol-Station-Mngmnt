<?php
session_start();

if (! isset($_SESSION['managerUsername'])) {
echo "<script>window.alert('Oooops You Must Login First');window.location='../index.html';</script>";
}else{
	include '../spClass.php';
	$spObject  = new  spClass();
	$managerInfo  = $spObject->getAllInfoForManager($_SESSION['managerUsername']);
	
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
		            <li class="active"><a href="managerDashboard.php"> <i class="fa fa-home"></i> Home</a></li>
		            <li class="active"><a href="managerDashboard.php?brilliant=viewUserInformation"> <i class="fa fa-user-circle-o"></i> My Profile</a></li>
		             
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

				<div class="col-md-1">

				</div>
				<div class="col-md-8">
					<?php
						switch (@$_GET['brilliant']) {
							case 'viewAllSupervisor':
							?>
								<div class="row">
								 <div class="col-md-1"></div>
								 <div class="col-md-10">
									 <div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                              <b  class="text text-success"><i class="icofont-user-suited" style="font-size: 30px;"></i> Full Information Of Supervisor </b> <b  style="color : #e96b56"></b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>

                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-10">


                      		<div class="row">
                      			<div class="col-md-2"></div>
                      			<div class="col-md-8">
                      				<?php echo (@$_GET['status'] == "supervisorAccountCreated") ? "<div class='mb-2'></div><div class='alert alert-success animated shake' id='sams1' style='height:45px;'><center><i><b> Supervisor Account Has Been Created Successfull </b></i></center> </div> ":"" ?>


                      				<?php echo (@$_GET['status'] == "supervisorGetUpdated") ? "<div class='mb-2'></div><div class='alert alert-info animated shake' id='sams1' style='height:45px;'><center><i><b> Supervisor Account Has Been Modified Successfull </b></i></center> </div> ":"" ?>

                      				<?php echo (@$_GET['status'] == "supervisorDeleted") ? "<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b> Supervisor Account Has Been Deleted / Trashed </b></i></center> </div> ":"" ?>


                      			</div>
                      			<div class="col-md-2"></div>
                      		</div>


                      		<table class="table table-bordered table-striped table-sm">
                      			<thead class="bg-dark text-white">
                      				<tr>
                      					<th>No</th>
                      					<th><i class="icofont-user-suited" style="color: orange;"></i> Name</th>
                      					<th><i class="fa fa-transgender" style="color: orange;"></i> Gender</th>
                      					<th><i class="icofont-iphone" style="color: orange;"></i> Phone</th>
                      					<th><i class="fa fa-user-circle-o" style="color: orange;"></i> Username</th>
                      					<th><i class="fa fa-flag-o" style="color: orange;"></i> Branch</th>
                      					<th><i class="fa fa-trash" style="color: #dc3545;"></i> Trash</th>
                      					<th><i class="icofont-pencil-alt-5" style="color: #17a2b8;"></i> Modify</th>
                      				</tr>
                      			</thead>

                      			<?php 
                      			  $no  = 0;
                      				$supData  = $spObject->gatherAllInformationRelatedToSupervisor();
                      				foreach ($supData as $key => $value) {
                      				$no  +=1;
                      				?>
                      					<tr>
                      						<td><?php echo $no ?></td>
                      						<td><?php echo $supData[$key]['userfullNames'] ?></td>
                      						<td><?php echo $supData[$key]['userGender'] ?></td>
                      						<td><?php echo $supData[$key]['userPhone'] ?></td>
                      						<td><?php echo $supData[$key]['userName'] ?></td>
                      						<td><?php echo $supData[$key]['userAssignedBranch'] ?></td>
                      						<td><center><a href="../spHundler.php?brilliant=deletedSupervisor&superId=<?php echo $supData[$key]['userId'] ?>" class=""><button class="btn btn-danger btn-sm" onclick="return window.confirm('Are You Really Want To Delete This Person')"><i class="fa fa-trash"></i></button></a></center></td>
                      						<td><center><a href="managerDashboard.php?brilliant=addNewerSupervisor&superId=<?php echo $supData[$key]['userId'] ?>" class="btn btn-info btn-sm"><i class="icofont-pencil-alt-5"></i></a></center></td>
                      					</tr>
                      				<?php
                      				}
                      			?>
                      		</table>


                      		<center><a href="managerDashboard.php?brilliant=addNewerSupervisor"><i class="fa fa-plus"></i> Add New Supervisor</a></center>

                      	</div>
                      	<div class="col-md-1"></div>
                      </div>


                    </div>
                  </div>
                </div>
							<?php
							break;


							case 'addNewerSupervisor':
							$supervisorInfo  = $spObject->selectInfoRelatedToSingleSuperVisor(@$_GET['superId']);
							// print_r($supervisorInfo);
							?>
								<div class="row">
								 <div class="col-md-2"></div>
								 <div class="col-md-8">
									 <div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>

                              	<?php

                              		if (@$_GET['superId']) {
                              		?>
                              			 <b  class="text text-warning"><i class="icofont-pencil-alt-5" style="font-size: 30px;"></i> Modify Existing Supervisor </b> <b  style="color : #e96b56"></b>
                              		<?php
                              		}else{
                              		?>
                              			 <b  class="text text-success"><i class="icofont-save" style="font-size: 30px;"></i> Register New Supervisor </b> <b  style="color : #e96b56"></b>
                              		<?php
                              		}
                              	 ?>
            
                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>

                      <div class="row">
                      	<div class="col-md-3"></div>
                      	<div class="col-md-6">

                      		<div class="input-group">
                      			<input type="text" value="<?php echo ( @$_GET['superId'] ) ? $supervisorInfo[0]['userfullNames'] : '' ?>" class="form-control superNames" placeholder="Enter Supervisor Name">
                      			<div class="input-group-append">
                      				<span class="input-group-text"><i class="fa fa-user-circle-o"></i></span>
                      			</div>
                      		</div><div class="mb-2"><span class="superNames-message"></span></div>

                      		<div class="input-group">
                      			<select class="form-control superGender">
                      				<option>Select Gender</option>
                      				<option <?php echo ((@$_GET['superId']) && ($supervisorInfo[0]['userGender']  == "Male") ) ? "selected":"" ?>>Male</option>
                      				<option <?php echo ((@$_GET['superId']) && ($supervisorInfo[0]['userGender']  == "Female") ) ? "selected":"" ?>>Female</option>
                      			</select>
                      			<div class="input-group-append">
                      				<span class="input-group-text"><i class="fa fa-transgender"></i></span>
                      			</div>
                      		</div><div class="mb-2"><span class="superGender-message"></span></div>


                      		<div class="input-group">
                      			<input type="text" value="<?php echo ( @$_GET['superId'] ) ? $supervisorInfo[0]['userPhone'] : '' ?>" class="form-control superPhone" placeholder="Enter Supervisor Phone">
                      			<div class="input-group-append">
                      				<span class="input-group-text"><i class="icofont-iphone"></i></span>
                      			</div>
                      		</div><div class="mb-2"><span class="superPhone-message"></span></div>


                      		<div class="input-group">
                      			<input type="text" value="<?php echo ( @$_GET['superId'] ) ? $supervisorInfo[0]['userAssignedBranch'] : '' ?>" class="form-control superBranch" placeholder="Enter Supervisor Branch">
                      			<div class="input-group-append">
                      				<span class="input-group-text"><i class="icofont-flag"></i></span>
                      			</div>
                      		</div><div class="mb-2"><span class="superBranch-message"></span></div>


                      		<div class="input-group">
                      			<input type="text"  value="<?php echo ( @$_GET['superId'] ) ? $supervisorInfo[0]['userName'] : '' ?>" class="form-control superUsername" placeholder="Enter Supervisor Username">
                      			<div class="input-group-append">
                      				<span class="input-group-text"><i class="icofont-user-suited"></i></span>
                      			</div>
                      		</div><div class="mb-2"><span class="superUsername-message"></span></div>


                      		<div class="input-group">
                      			<input type="password"  value="<?php echo ( @$_GET['superId'] ) ? $supervisorInfo[0]['userPassword'] : '' ?>" class="form-control superPassword" placeholder="Enter Supervisor Password">
                      			<div class="input-group-append">
                      				<span class="input-group-text"><i class="icofont-lock"></i></span>
                      			</div>
                      		</div><div class="mb-2"><span class="superPassword-message"></span></div>


                      		


                      		<?php
                      			if (@$_GET['superId']) {
                      			?>
                      			  <input type="hidden" class="form-control superId" value="<?php echo @$_GET['superId'] ?>" name="">
                      				<button class="btn btn-warning btn-block btnToModifySupervisor"> <i class="icofont-pencil-alt-2"></i> Modify Supervisor</button>
                      			<?php
                      			}else{
                      			?>
                      				<button class="btn btn-primary btn-block btnToSaveSupervisor"> <i class="icofont-save"></i> Save Supervisor</button>
                      			<?php
                      			}
                      		 ?>
                      	</div>
                      	<div class="col-md-2"></div>
                      </div>


                    </div>
                  </div>
                </div>
							<?php
							break;


							case 'viewSuperVisorForReport':
							?>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
												<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                              <b  class="text text-success"><i class="icofont-user-alt-5" style="font-size: 30px;"></i> Check Activity Of Supervisor </b> <b  style="color : #e96b56"></b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>

                      <div class="row">
                      	<div class="col-md-3"></div>
                      	<div class="col-md-6">


                      		<ul class="list-group">
                      			<li class="list-group-item bg-info text-white"><center><b>SELECT SUPERVISOR TO CHECK</b></li>

		                      	<?php 
		                      	  $superData  = $spObject->selectSupervisorToViewTheirRepport();
		                      		foreach ($superData as $key => $value) {
		                      		?>
		                      			<li class="list-group-item"><a href="managerDashboard.php?brilliant=viewSuperData&superUsername=<?php echo $superData[$key]['supervisorAccount'] ?>" class="btn btn-dark btn-block"><?php echo   $superData[$key]['supervisorAccount'] ?></a></li>
		                      		<?php
		                      		}
		                      	?>

		                      </ul>
		                     
                      		
                      	</div>
                      	<div class="col-md-3"></div>
                      </div>


                    


										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
							<?php	
							break;

							case 'viewSuperData':

							$filterByPompiste = $spObject->selectPumpisteCollector(@$_GET['superUsername']);
							$filterByFuel 	  = $spObject->selectFuelHistory(@$_GET['superUsername']);
							$filterByPayment 	  = $spObject->selectPaymentHistory(@$_GET['superUsername']);
							?>
								<div class="row">
									<div class="col-md-0"></div>
									<div class="col-md-12">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> Dear Manager Trace Out Report For Supervisor</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>

                      	 <input type="hidden" class="form-control myOwnAccount"  value="<?php echo @$_GET['superUsername'] ?>">


                         <table style="margin-left: 10px;" class="table table-sm">
                          <thead class="bg-light">
                          <tr>
                           
                            <td>&nbsp;</td>
                            <td><i class="fa fa-user-secret"></i></td>
                            <td>
                              <a href="#"><select class="filter form-control filterByUsers"  style="border-left: none; border-bottom: none;border-top: none; height: 40px;width: 135px;">
                                <option> Filter By Users      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                 <?php
                                   foreach ($filterByPompiste as $key => $value) {
                                   ?>
                                    <option value="<?php echo $filterByPompiste[$key]['doneby'] ?>"><?php echo $filterByPompiste[$key]['doneby'] ?></option>
                                    <?php
                                   }
                                ?>
                              </select></a>
                            </td> 

                            <td>&nbsp;</td>
                            <td><i class="fa fa-google-wallet"></i></td>
                            <td>
                              <a href="#"><select class="filter form-control filterByFuel"  style="border-left: none; border-bottom: none;border-top: none; height: 40px;width: 135px;">
                                <option> Filter by Fuel&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                 <?php
                                   foreach ($filterByFuel as $key => $value) {
                                   ?>
                                    <option value="<?php echo $filterByFuel[$key]['fuelConsumed'] ?>"><?php echo $filterByFuel[$key]['fuelConsumed'] ?></option>
                                    <?php
                                   }
                                ?>
                              </select></a>
                            </td> 

                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                              <input type="date" class="form-control soldFuelOnDate">
                            </td> 
                            <td><button class="btn btn-secondary btnApproveSoldDateOn"><i class="fa fa-calendar"></i></button></td>                        

                            <td>&nbsp;</td>
                            <td><input type="date"  class="form-control fromDateFilter" placeholder="From Date"></td>
                              <td>&nbsp;&nbsp;</td>
                              <td><input type="date"  class="form-control toDateFilter" placeholder="To Date"></td>
                              <td>&nbsp;&nbsp;</td>
                              <td><button class="btn-dark btn-sm fromToBtnSearchBtn"><i class="fa fa-search"></i></button></td>
                          </tr>
                          </thead>
                          </table>


                          <div class="row">
                          	<div class="col-md-0"></div>
                          	<div class="col-md-12">
                          		<div class="filteredDataHere">
                          				<div class="section-title">
					                          <h3>
					                              <center>
					                                <b class="btn text-info"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> <b style="font-size: 25px;">ALL CLIENTS FROM YOUR  PUMP ATENDANTANT</b></b>

					                                <div class="row"><div class="col-md-4"></div><div class="col-md-4"><hr></div><div class="col-md-4"></div></div>
					                             </center> 
					                          </h3>
					                     	 </div><div class="mb-1"></div>

					                     	 <table class="table table-bordered table-hover table-striped table-sm">
																	<thead class="bg-dark text-white">
																		<tr>
																			<th>Id</th>
																			<th>Client Name</th>
																			<th>Pompiste</th>
																			<th>Vehicle Type</th>
																			<th>Plate Number</th>
																			<th>Fuel Type</th>
																			<th>Fuel Price</th>
																			<th>Liter</th>
																			<th>Total</th>
																			<th>Status</th>
																			<th>Date</th>

																		</tr>
																	</thead>

																	<?php 
																		$selectAllClients  = $spObject->selectAllClientFromMyPompiste(@$_GET['superUsername']);
																		$no = 0;
																		foreach ($selectAllClients as $key => $value) {
																			$no += 1;
																		?>
																			<tr>
																				<td><?php echo $no ?></td>
																				<td><?php echo $selectAllClients[$key]['clientNames'] ?></td>
																				<td><?php echo $selectAllClients[$key]['doneby'] ?></td>
																				<td><?php echo $selectAllClients[$key]['clientvehicleType'] ?></td>
																				<td><?php echo $selectAllClients[$key]['clientVehiclePlate'] ?></td>
																				<td><?php echo $selectAllClients[$key]['fuelConsumed'] ?></td>
																				<td><?php echo $selectAllClients[$key]['fuelPrice'] ?> RWF</td>
																				<td><?php echo $selectAllClients[$key]['fuelLitle'] ?> L</td>
																				<td><?php echo $selectAllClients[$key]['total'] ?> RWF</td>
																				<td><?php  

																						if($selectAllClients[$key]['paymentStatus'] == "no_payment"){
																						?>
																						  <span class="badge badge-danger">Not Yet Paid</span>
																						<?php
																						}else{
																						?>
																						   <span class="badge badge-success">Paid Successfull</span>
																						<?php
																						} ?></td>

																						<td><?php echo $selectAllClients[$key]['date'] ?> </td>

																			</tr>
																		<?php
																		}
																	?>

																 </table>


                          		</div>
                          	</div>
                          	<div class="col-md-0"></div>
                          </div>


										</div>
									</div>
									<div class="col-md-0"></div>
								</div>
							<?php	
							break;

							default:
							?>
			
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
										<center>
												<img src="../icon/spHQ.jpg" class="" style="width: 100%; height: 200%;">
											</center>
										</div>
									
							<?php
							break;
						}
					 ?>
				</div>
				<div class="col-md-2">
					<div class="card" style="width:360px">
					  <img class="card-img-top" src="../icon/smartIcon.png" alt="Card image">
					  <img src="../icon/Loader/spinner-loader.gif" style="height: 35px; width: 35px; margin-top: -205px;margin-left: 110px; border-radius: 50px;"><br><br><br><br><br><br><br>
					  <div class="card-body">
					    <h4 class="card-title"><b class="text text-primary">MANAGER</b> <b><?php echo $managerInfo[0]['managerFullName'] ?></b></h4>
					    <ul class="list-group list-group-unbordered">
					    	<li class="list-group-item"><h5><i class="fa fa-user-circle-o fa-1x"></i> <a href="managerDashboard.php?brilliant=viewAllSupervisor" class="text text-primary"><b>Manage Supervisor</b></a></h5></li>
					    	<li class="list-group-item"><h5> <i class="fa fa-eye fa-1x"></i> <b><a href="managerDashboard.php?brilliant=viewSuperVisorForReport" class="text text-primary">View Report</a></b> </h5></li>
					    	<li class="list-group-item"><h5><i class="fa fa-sign-out"></i> <b><a href="../spHundler.php?brilliant=trashOut" class="text text-primary">Logout</a></b></h5></li>
					    </ul>
					  </div>
					</div>
				</div>
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
						Any questions? Let us know in An Sp Station , Kigali , Musanze, Rubavu District or call us on (+250) 789239908
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
				
				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					<b class="text text-white">&copy; Copyright</b> <strong><span><b style="color: skyblue;text-shadow: 1px 1px #ffffff;">Société</b> <b style="color: yellow;text-shadow: 1px 1px #000;">Pétrolière</b> (<b style="color: skyblue;text-shadow: 1px 1px #ffffff;">S</b><b  style="color: yellow;text-shadow: 1px 1px #000;">P</b>)</span></strong>. <b class="text text-white">All Rights Reserved<b/> <div class="mb-2"></div> <center>Designed by <a href="www.ginnovahub.com">JC MISIGARO</a></center>

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
	</script>	



	<script>
		$(document).ready(function(){

			function addSupervisor(){
				$(".btnToSaveSupervisor").on("click",function(){
					
					let superNames     = $(".superNames").val();
					let superGender    = $(".superGender").val();
					let superPhone     = $(".superPhone").val();
					let superUsername  = $(".superUsername").val();
					let superPassword  = $(".superPassword").val();
					let superBranch  = $(".superBranch").val();

					let integerRegex  = /^[0-9]+$/;


					if (superNames  == "") {
							$('.superNames-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Supervisor Name Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superGender  == "Select Gender") {
							$('.superGender-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Supervisor Gender Needed To Be Selected</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone  == "") {
							$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Supervisor Phone Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone  == "") {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Phone Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (!superPhone.match(integerRegex)) {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Phone Number  Must Be Integer Only</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone.length < 10) {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Too Low Phone Number,At Leats 10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone.length > 10) {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Too High Phone Number,At Least  10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superBranch  == "") {
						$('.superBranch-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Supervisor Branch  Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superUsername  == "") {
						$('.superUsername-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Supervisor Login Username Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPassword  == "") {
						$('.superPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Supervisor Password  Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPassword.length < 6) {
						$('.superPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Password  Must Be 6 Character And Above</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}else{

						$.ajax({
							method : "POST",
							url : "../spHundler.php?brilliant=addNewSupervisor",
							data : {
								 superNames  : superNames,
								 superGender : superGender,
								 superPhone : superPhone,
								 superUsername : superUsername,
								 superPassword : superPassword,
								 superBranch : superBranch

							},

							success : function(response){
								let resp  = String(response);

								if (resp  == "supervisorCreated") {
									window.location.href="managerDashboard.php?brilliant=viewAllSupervisor&status=supervisorAccountCreated";
								}if (resp  == "supervisorCreated") {
									if (superUsername  == "") {
										$('.superUsername-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Ooops This Username Has Been Taken</b></i></center> </div> ");
					            window.setTimeout(function() {
					            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
					            $(this).remove(); 
					            });
					            }, 2500);	
					            return false;
									}
								}
							}

						});

					}
				});
			}			


			function modifySupervisor(){
				$(".btnToModifySupervisor").on("click",function(){

					let superNames     = $(".superNames").val();
					let superGender    = $(".superGender").val();
					let superPhone     = $(".superPhone").val();
					let superUsername  = $(".superUsername").val();
					let superPassword  = $(".superPassword").val();
					let superBranch  = $(".superBranch").val();
					let superId  = $(".superId").val();

					let integerRegex  = /^[0-9]+$/;


					if (superNames  == "") {
							$('.superNames-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Supervisor Name Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superGender  == "Select Gender") {
							$('.superGender-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Supervisor Gender Needed To Be Selected</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone  == "") {
							$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Supervisor Phone Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone  == "") {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Phone Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (!superPhone.match(integerRegex)) {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Phone Number  Must Be Integer Only</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone.length < 10) {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Too Low Phone Number,At Leats 10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPhone.length > 10) {
						$('.superPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Too High Phone Number,At Least  10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superBranch  == "") {
						$('.superBranch-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Supervisor Branch  Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superUsername  == "") {
						$('.superUsername-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Supervisor Login Username Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPassword  == "") {
						$('.superPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Supervisor Password  Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (superPassword.length < 6) {
						$('.superPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Password  Must Be 6 Character And Above</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}else{

													$.ajax({
							method : "POST",
							url : "../spHundler.php?brilliant=modifyExistingSupervisor",
							data : {
								 superNames    : superNames,
								 superGender   : superGender,
								 superPhone    : superPhone,
								 superUsername : superUsername,
								 superPassword : superPassword,
								 superBranch   : superBranch,
								 superId 			 : superId
							},

							success : function(response){
								let resp  = String(response);
								
								if (resp  == "supervisorModified") {
									window.location.href="managerDashboard.php?brilliant=viewAllSupervisor&status=supervisorGetUpdated";
								}if (resp  == "supervisorNotModified") {
									window.alert("Ooops Un Enable To Update Supervisor");
								}
							}

						});

					}

				});
			}



						function filterBasedOnPompist(){
				$(".filterByUsers").on("change",function(){
					 let filterByUsers  = $(this).val();
					 let myOwnAccount   = $(".myOwnAccount").val();

					 $.ajax({
					 		method : "POST",
					 		url : "../spHundler.php?brilliant=filterBasedOnPompist",
					 		data :{
					 			filterByUsers : filterByUsers,
					 			myOwnAccount : myOwnAccount
					 		},
					 		success : function(response){
					 			let resp  = String(response);
					 			$(".filteredDataHere").html(response);
					 		}
					 });
					 

				});
			}			


			function filterBasedOFuel(){
				$(".filterByFuel").on("change",function(){
					 let filterByFuel  = $(this).val();
					 let myOwnAccount   = $(".myOwnAccount").val();

					 $.ajax({
					 		method : "POST",
					 		url : "../spHundler.php?brilliant=filterBasedOFuel",
					 		data :{
					 			filterByFuel : filterByFuel,
					 			myOwnAccount : myOwnAccount
					 		},
					 		success : function(response){
					 			let resp  = String(response);
					 			$(".filteredDataHere").html(response);
					 		}
					 });
					 

				});
			}			

		
			function filterBasedOnPayment(){
				$(".filterByPayment").on("change",function(){
					 let filterByPayment  = $(this).val();
					 let myOwnAccount   = $(".myOwnAccount").val();

					 $.ajax({
					 		method : "POST",
					 		url : "../spHundler.php?brilliant=filterBasedOnPayment",
					 		data :{
					 			filterByPayment : filterByPayment,
					 			myOwnAccount : myOwnAccount
					 		},
					 		success : function(response){
					 			let resp  = String(response);
					 			$(".filteredDataHere").html(response);
					 		}
					 });
					 

				});
			}			


			function filterBasedOnDate(){
				$(".btnApproveSoldDateOn").on("click",function(){
					 let filteredDate   = $(".soldFuelOnDate").val();
					 let myOwnAccount   = $(".myOwnAccount").val();

					 $.ajax({
					 		method : "POST",
					 		url : "../spHundler.php?brilliant=filterBasedOnDatePurchased",
					 		data :{
					 			filteredDate : filteredDate,
					 			myOwnAccount : myOwnAccount
					 		},
					 		success : function(response){
					 			let resp  = String(response);
					 			$(".filteredDataHere").html(response);
					 		}
					 });
					 

				});
			}			


			function SearchRanangeOfDate(){
				$(".fromToBtnSearchBtn").on("click",function(){
					 let filteredStarOn   = $(".fromDateFilter").val();
					 let filteredEndOn    = $(".toDateFilter").val();
					 let myOwnAccount   = $(".myOwnAccount").val();

					 $.ajax({
					 		method : "POST",
					 		url : "../spHundler.php?brilliant=filterBasedOnRangeOfDate",
					 		data :{
					 			filteredStarOn : filteredStarOn,
					 			filteredEndOn : filteredEndOn,
					 			myOwnAccount : myOwnAccount
					 		},
					 		success : function(response){
					 			let resp  = String(response);
					 			$(".filteredDataHere").html(response);
					 		}
					 });
					 

				});
			}

			filterBasedOnPompist();
			filterBasedOFuel();
			filterBasedOnPayment();
			filterBasedOnDate();
			SearchRanangeOfDate();

			addSupervisor();
			modifySupervisor();

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