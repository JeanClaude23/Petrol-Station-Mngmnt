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
		            <li class="active"><a href="supervisorDashboard.php"> <i class="fa fa-home"></i> Home</a></li>
		            <li class="active"><a href="supervisorDashboard.php?brilliant=viewUserInformation"> <i class="fa fa-user-circle-o"></i> My Profile</a></li>
		             
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


		        <ul class="list-group list-group-unbordered" style="box-shadow: 2px 2px 2px 2px gray;border-radius: 80px 10px 50px 10px;">

		        <li class="list-group-item" style="border-radius: 50px 0px 0px 0px;"><center><h4><b class="text text-danger">SUPERVISOR</b></h4></center><div class="mb-3"></div> <img src="../icon/supervisor.png" class="img img-thumbnail img-responsive"  style="border-radius: 1000px; box-shadow:1px 1px 1px 1px black;"></li>

                 <li class="list-group-item"><a href="supervisorDashboard.php?brilliant=addNewPompiste" class="btn btn-link" style="text-decoration: none;"> <i class="fa fa-plus" style="font-size: 20;"></i><i class="fa fa-user" style="font-size: 23;"></i> Pump Attendant </b></a></li>
                 

                 <li class="list-group-item"><a href="supervisorDashboard.php?brilliant=viewFuelInTank" class="btn btn-link" style="text-decoration: none;"><i class="icofont-car-alt-1" style="font-size: 23px;"></i> Manage  Fuel </b></a></li>                 


                 <li class="list-group-item"><a href="supervisorDashboard.php?brilliant=makeFuelReport" class="btn btn-link" style="text-decoration: none;"> <i class="fa fa-book" style="font-size: 23px;"></i> Report </b></a></li>



                 <li class="list-group-item" style="border-radius: 0px 0px 50px 0px;"><a href="../spHundler.php?brilliant=trashOut" class="btn btn-link" style="text-decoration: none;"><i class="fa fa-sign-out" style="font-size: 30px;color: #e96b56;"></i> <b style="font-size: 18px;" class="text text-info"> Logout</b></a></li>  

		          </ul>

				</div>
				<div class="col-md-9">
					<?php
						switch (@$_GET['brilliant']) {
							case 'addNewPompiste':
							?>
								<div class="row">
								  <div class="col-md-2">
	
								  </div>
									<div class="col-md-8">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b  class="text text-info"><i class="icofont-save" style="font-size: 30px;"></i>  List  of Pump Attendant</b>

                                <div class="row"><div class="col-md-4"><a  href="supervisorDashboard.php?brilliant=addNewPomistic" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i><i class="icofont-user-alt-5"></i>  Add New Pumpist</a></div><div class="col-md-4"><hr></div><div class="col-md-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>


                      <div class="row">
                      	<div class="col-md-2"></div>
                      	<div class="col-md-8">
                      		<?php
                      				echo (@$_GET['status'] == "pumpisteRegisted") ? "<div class='mb-2'></div><div class='alert alert-success animated shake' id='sams1' style='height:45px;'><center><i> <b> Pump Attendant Has Been Added Successfull</b></i></center> </div> ":"";


                      				echo (@$_GET['status'] == "pumpisteDeleted") ? "<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Pump Attendant Has Been Deleted Successfull</b></i></center> </div> ":"";


                      				echo (@$_GET['status'] == "pumpisteModify") ? "<div class='mb-2'></div><div class='alert alert-info animated shake' id='sams1' style='height:45px;'><center><i> <b> Pump Attendant Info Has Been Modified Successfull</b></i></center> </div> ":"";
                      		 ?>
                      	</div>
                      	<div class="col-md-2"></div>
                      </div>

                      <table class="table table-bordered table-hover table-sm table-striped">
                      <thead class="bg-dark text-white">
                      	<tr>
                      		<th>N<sup>o</sup></th>
                      		<th>Names</th>
                      		<th>Gender</th>
                      		<th>Phone</th>
                      		<th>Username</th>
                      		<th>Branch Assigned</th>
                      		<th>View</th>
                      	</tr>
                      </thead>

                      <?php
                      $count = $spObject->sisThereAnyPompistedOnTable($_SESSION['pompiste_usernename']);

                      if($count > 0){

                      	$dataz  = $spObject->sisThereAnyPompistedOnTableReallyData($_SESSION['pompiste_usernename']);
                      	$no = 0;
                      	foreach ($dataz as $key => $value) {
                      	$no +=1;
                      	?>
                      		<tr>
                      			<td><?php echo $no ?></td>
                      			<td><?php echo $dataz[$key]['userfullNames']; ?></td>
                      			<td><?php echo $dataz[$key]['userGender']; ?></td>
                      			<td><?php echo $dataz[$key]['userPhone']; ?></td>
                      			<td><?php echo $dataz[$key]['userName']; ?></td>
                      			<td><?php echo $dataz[$key]['userAssignedBranch']; ?></td>
                      			<td><a href="supervisorDashboard.php?brilliant=viewFullPumpisteInfo&pumpUsername=<?php echo $dataz[$key]['userName'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                      			
                      		</tr>
                      	<?php 
                      	}
                      }else{
                      ?>
                      	<tr>
                      		<th colspan="7">
                      			<b class="text text-danger"><center>Oooops No Pump Attendant</center></b>
                      		</th>
                      	</tr>
                      <?php
                      }
                       ?>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </div>
							<?php
							break;

							case 'viewFullPumpisteInfo':
								$pumpisteData = $spObject->selectAllInformationForPumpAttendant(@$_GET['pumpUsername']);
								// print_r($pumpisteData);
							?>
								<div class="row">
								 <div class="col-md-1"></div>
								 <div class="col-md-10">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                              <b  class="text text-info"><i class="icofont-user-suited" style="font-size: 30px;"></i> Full Information Of Pump Attendant </b> <b  style="color : #e96b56"><?php echo  $pumpisteData[0]['userName'] ?></b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>


                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-5">
                      		<fieldset class="border p-2">
                      			<legend><b style="color:#e96b56;" class=" text">User Personal Info</b></legend>

                      			<table class="table table-bordered table-hover table-striped table-sm">

                      				<tr>
                      					<th><i class="icofont-user-alt-5"></i> Pumpisted Name</th>
                      					<td><?php echo $pumpisteData[0]['userfullNames'] ?></td>
                      				</tr>

                      				<tr>
                      					<th><i class="fa fa-transgender"></i> Gender</th>
                      					<td><?php echo $pumpisteData[0]['userGender'] ?></td>
                      				</tr>	


                      				<tr>
                      					<th><i class="icofont-iphone"></i> Phone</th>
                      					<td><?php echo $pumpisteData[0]['userPhone'] ?></td>
                      				</tr>                      				

                      				<tr>
                      					<th><i class="icofont-iphone"></i> Phone</th>
                      					<td><?php echo $pumpisteData[0]['userPhone'] ?></td>
                      				</tr>

                      			</table>


                      			<table class="table table-bordered table-hover table-striped table-sm">
                      				<tr>
                      					<th><center><a href="../spHundler.php?brilliant=deletePumpiste&pumpUsername=<?php echo $pumpisteData[0]['userName'] ?>" class="btn btn-danger btn-block"><i class="icofont-trash"></i> Delete</a></center></th>
                      					<th><center><a href="supervisorDashboard.php?brilliant=addNewPomistic&pumpUsername=<?php echo $pumpisteData[0]['userName'] ?>" class="btn btn-info btn-block"><i class="icofont-pencil-alt-5"></i> Update</a></center></th>
                      				</tr>
                      			</table>
                      		</fieldset>
                      	</div>
                      	<div class="col-md-1"></div>
                      	<div class="col-md-5">
                      		<fieldset class="border p-2">
                      			<legend><b style="color:#e96b56;" class=" text">System Assigned Info</b></legend>

                      			<table class="table table-bordered table-hover table-striped table-sm">

                      				<tr>
                      					<th><i class="fa fa-flag-o"></i> Role</th>
                      					<td><?php echo $pumpisteData[0]['userRole'] ?></td>
                      				</tr>

                      				<tr>
                      					<th><i class="fa fa-envelope"></i> Username</th>
                      					<td><?php echo $pumpisteData[0]['userName'] ?></td>
                      				</tr>	


                      				<tr>
                      					<th><i class="icofont-home"></i> Branch Assigned</th>
                      					<td><?php echo $pumpisteData[0]['userAssignedBranch'] ?></td>
                      				</tr>                      				

                      				<tr>
                      					<th><i class="icofont-user-suited"></i> Supervised By</th>
                      					<td><?php echo $pumpisteData[0]['SupervisedBy'] ?></td>
                      				</tr>	


                      				<tr>
                      					<th><i class="icofont-calendar"></i> Created On</th>
                      					<td><?php echo $pumpisteData[0]['date'] ?></td>
                      				</tr>

                      			</table>
                      		</fieldset>
                      	</div>
                      </div>





                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
							<?php	
							break;


							case 'addNewPomistic':
							$pumpisteData = $spObject->selectAllInformationForPumpAttendant(@$_GET['pumpUsername']);
							// print_r($pumpisteData);
							?>
							<div class="row">
								  <div class="col-md-2"></div>
									<div class="col-md-7">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                             
                          	    <?php echo (@$_GET['pumpUsername']) ? "<b  class='text text-warning'><i class='icofont-pencil-alt-5' style='font-size: 30px;'></i>  Update Pumpiste</b>":"<b  class='text text-info'><i class='icofont-save' style='font-size: 30px;'></i>    Save Pumpiste</b>" ?>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>


                      <div class="row">
                      	<div class="col-md-2"></div>
                      	<div class="col-md-8">
                      		 <fieldset class="border p-2">
			                      	<legend>
			                      		<?php echo (@$_GET['pumpUsername']) ? "	<b class='text text-info'>Make Change To Pump Attendant</b>":"<b style='color : #e96b56'>Register New Pump Attendant</b>" ?>

			                      	</legend>

			                      	<div class="input-group">
			                      		<div class="input-group-prepend">
			                      			<div class="input-group-text"><span class="icofont-user-alt-5"></span></div>
			                      		</div>
			                      		<input type="text" value="<?php echo ( @$_GET['pumpUsername'] ) ? $pumpisteData[0]['userfullNames'] : '' ?>" class="form-control pumpistFullName"  placeholder="Enter Pump Attendant Full Name">
			                      	</div><div class="mb-2"><span class="pumpistFullName-message"></span></div>	

			                      	<div class="input-group">
			                      		<div class="input-group-prepend">
			                      			<div class="input-group-text"><span class="fa fa-transgender"></span></div>
			                      		</div>
			                      		<select class="form-control pumpistGender">
			                      			<option>Select Pump Attendant Gender</option>
			                      			<option <?php echo ((@$_GET['pumpUsername']) && ($pumpisteData[0]['userGender']  == "Male") ) ? "selected":"" ?>>Male</option>
			                      			<option <?php echo ((@$_GET['pumpUsername']) && ($pumpisteData[0]['userGender']  == "Female") ) ? "selected":"" ?>>Female</option>
			                      		</select>
			                      	</div><div class="mb-2"><span class="pumpistGender-message"></span></div>
															
															<div class="input-group">
			                      		<div class="input-group-prepend">
			                      			<div class="input-group-text"><span class="icofont-iphone"></span></div>
			                      		</div>
			                      		<input type="text"  value="<?php echo ( @$_GET['pumpUsername'] ) ?  $pumpisteData[0]['userPhone'] : "" ?>" class="form-control pumpistPhone" placeholder="Enter Pump Attendant Phone">
			                      	</div><div class="mb-2"><span class="pumpistPhone-message"></span></div>		


			                      	<div class="input-group">
			                      		<div class="input-group-prepend">
			                      			<div class="input-group-text"><span class="fa fa-envelope"></span></div>
			                      		</div>

			                      		<?php

			                      			if (@$_GET['pumpUsername']) {
			                      			?>
			                      					<input type="text" value="<?php echo $pumpisteData[0]['userName'] ?>" class="form-control pumpistUsername" placeholder="Create Pump Attendant username" readonly>
			                      			<?php
			                      			}else{
			                      			?>
			                      					<input type="text" class="form-control pumpistUsername" placeholder="Create Pump Attendant username">
			                      			<?php
			                      			}
			                      		 ?>
			                      	
			                      	</div><div class="mb-2"><span class="pumpistUsername-message"></span></div>



			                      	<div class="input-group">
			                      		<div class="input-group-prepend">
			                      			<div class="input-group-text"><span class="fa fa-lock"></span></div>
			                      		</div>
			                      		<input type="password" value="<?php echo ( @$_GET['pumpUsername'] ) ?  $pumpisteData[0]['userPassword'] : "" ?>" class="form-control pumpistPassword" placeholder="Create Pump Attendant Password">
			                      	</div><div class="mb-2"><span class="pumpistPassword-message"></span></div>

			                      	<?php echo (@$_GET['pumpUsername']) ? "<button class='btn btn-warning btn-block btn-update-attendant'><i class='icofont-pencil-alt-5'></i> Modify  Pump Attendant</button>" : "<button class='btn btn-info btn-block btn-save-attendant'><i class='icofont-save'></i> Save  Pump Attendant</button>" ?>
			                      	


			                     </fieldset>
                      	</div>
                      	<div class="col-md-2"></div>
                      </div>

                     
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </div>

							<?php
							break;

							case 'viewFuelInTank':
							?>

								 <div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3>
                              <center>
                                <b class="btn text-info"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> <b style="font-size: 25px;">Fuel in the  tank</b></b>

                                <div class="row"><div class="col-md-4">
                                	<a href="supervisorDashboard.php?brilliant=viewMarked" class="btn btn-success" style="margin-left: 60px;"> <i class="fa fa-eye"></i> Yesterday Remaing</a>
                                </div><div class="col-md-4"><hr></div>
                                <div class="col-md-4">
                                	<a href="supervisorDashboard.php?brilliant=viewToDayMarked" class="btn btn-primary" style="margin-left: -70px;"> <i class="fa fa-eye"></i> View ToDay Remarked</a>
                                </div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>


                      <div class="row">
                      	<div class="col-md-1"></div>
                      	<div class="col-md-10">

                      		 	<?php echo (@$_GET['status'] == "fuelMarkedAsSell") ? "<div class='mb-2'></div><div class='alert alert-success animated shake' id='sams1' style='height:45px;'><center><i><b> Dear ".$_SESSION['pompiste_usernename']." Successfully You Have Marked Fuel ".@$_GET['fuelName']." </b></i></center> </div> ":"" ?>	

                            <?php echo (@$_GET['status'] == "ooopNotSellAnythin") ? "<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b> Dear ".$_SESSION['pompiste_usernename']." To Day You Didn't Sell Anthing About ".@$_GET['fuelName']." Fuel</b></i></center> </div> ":"" ?> 


                            <?php echo (@$_GET['status'] == "alreadyRemarket") ? "<div class='mb-2'></div><div class='alert alert-warning animated shake' id='sams1' style='height:45px;'><center><i><b> Dear ".$_SESSION['pompiste_usernename']." You Can't Remarked Twice Fuel Named ".@$_GET['fuelName']."</b></i></center> </div> ":"" ?>


                            <?php echo (@$_GET['status'] == "fuelUpdate") ? "<div class='mb-2'></div><div class='alert alert-info animated shake' id='sams1' style='height:45px;'><center><i><b> Fuels Modified Successfull</b></i></center> </div> ":"" ?>


                      		<table class="table table-bordered table-hover table-striped">
                      			<thead class="bg-dark text-white">
															<tr>
																<th>N<sup>o</sup></th>
																<th>Fuel Name</th>
																<th>Fuel Quantity</th>
																<th>Fuel Price</th>
																<th>Remaining Fuel</th>
																<th>Status In %</th>
																<th>Action</th>
															</tr>                      				
                      			</thead>

                      			<?php

                      				$data  = $spObject->tryToAccessFuelTank($_SESSION['pompiste_usernename']);

                      				$remaiPerc  = 0;
                      				foreach ($data as $key => $value) {
                      				 $remaiPerc   = ceil(($data[$key]['flRemaining'] * 100) / ($data[$key]['flQuantity']));

                      				?>
                      					<tr>
                      						<td><?php echo $data[$key]['flId'] ?></td>
                      						<td><?php echo $data[$key]['flName'] ?></td>
                      						<td><?php echo $data[$key]['flQuantity'] ?> L</td>
                      						<td><?php echo $data[$key]['flUnitPrice'] ?> RWF</td>
                      						<td><?php 


                      						if($data[$key]['flQuantity'] == $data[$key]['flRemaining']) {
                      						?>
                      							<span class="badge badge-success">Tank Is Full</span>
                      						<?php
                      						}else{
                      						?>
                      							<span class=""><?php echo $data[$key]['flRemaining'] ?> L</span>
                      						<?php
                      						}
                      						?></td>
                      						<td><?php 

                      							if(($remaiPerc == 100) || ($remaiPerc  >=80)){
                      							?>
                      								 <table class="table">
                                            <td><span class="badge badge-success"> FULL : </span></td>
                                            <td><b><?php echo $remaiPerc; ?>%</b></td>
                                       </table>
                      							<?php
                      							}else if(($remaiPerc == 79) || ($remaiPerc  >=50)){
                      							?>
                      								<table class="table">
                                            <td><span class="badge badge-info"> MEDIUM : </span></td>
                                            <td><b><?php echo $remaiPerc; ?>%</b></td>
                                      </table>
                      							<?php
                      							}else if (($remaiPerc == 49) || ($remaiPerc  >=20)) {
                      							?>
                      								 <table class="table">
                                            <td><span class="badge badge-warning"> LOW :</span></td>
                                            <td><b><?php echo $remaiPerc; ?>%</b></td>
                                       </table>
                      							<?php
                      							}else if ($remaiPerc <  20) {
                      							?>
                      								<table class="table">
                                            <td><span class="badge badge-danger"> Too Low</span></td>
                                            <td><b><?php echo $remaiPerc; ?>%</b></td>
                                      </table>
                      							<?php
                      							}

                      					?></td>
                      						<td><a href="supervisorDashboard.php?brilliant=modifyFuel&fuelId=<?php echo $data[$key]['flId'] ?>" class="btn btn-warning btn-sm"><i class="icofont-pencil-alt-5"></i></a></td>
                      					</tr>
                      				<?php
                      				}
                      			 ?>
                      		</table>
                      	</div>
                      	<div class="col-md-1"></div>
                      </div>


                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

							<?php
							break;

							case 'modifyFuel':
							$fuelData  = $spObject->selectFuelInTheTank(@$_GET['fuelId']);
							
							?>
								 <div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3>
                              <center>
                                <b class="btn text-warning"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> <b style="font-size: 25px;">Modify Fuel In The Tank</b></b>

                                <div class="row"><div class="col-md-4"></div><div class="col-md-4"><hr></div><div class="col-md-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-1"></div>


                      <div class="row">
                      	<div class="col-md-3"></div>
                      	<div class="col-md-6">


                      		<ul class="list-group">

	                      	  <li class="list-group-item bg-dark">
	                      	  	<b class="text text-white" ><center>LAST INFORMATION ON THIS FUEL</center></b>
	                      	  </li>

	                      	  <li class="list-group-item">
	                      	  	<table class="table table-bordered table-hover table-striped table-sm">
	                      	  	<tr>
	                      	  		<th>Fuel Name</th>
	                      	  		<td><?php echo $fuelData[0]['flName']; ?></td>
	                      	  	</tr>

	                      	  	<tr>
	                      	  		<th>Fuel Price</th>
	                      	  		<td><?php echo $fuelData[0]['flUnitPrice']; ?> RWF</td>
	                      	  	</tr>

	                      	  	<tr>
	                      	  		<th> Last Recent Quantity</th>
	                      	  		<td><?php echo $fuelData[0]['flQuantity'] ?> L</td>
	                      	  	</tr>


	                      	  	<tr>
	                      	  		<th> Current Remaining</th>
	                      	  		<td><?php echo $fuelData[0]['flRemaining'] ?> L</td>
	                      	  	</tr>
	                      	  	</table>
	                      	 </li>

	                      	 <li class="list-group-item bg-info">
	                      	 		<b class="text text-warning"><center>MODIFY  FUEL INFORMATION</center></b>
	                      	 </li>

	                      	 <li class="list-group-item">


		                      		<div class="input-group">
		                      			<div class="input-group-prepend">
		                      				<span class="input-group-text">
		                      					<i class="icofont-money"></i>
		                      				</span>
		                      			</div>
		                      			<select class="form-control selectActionOnFuel">
		                      				<option>Select Action On Price</option>
		                      				<option>Increase Price</option>
		                      				<option>Decrease Price</option>
		                      				<option selected>No Action</option>
		                      			</select>
		                      		</div><div class="mb-2"><span class="selectActionOnFuel-message"></span></div>		                      		



		                      		<div class="input-group">
		                      			<div class="input-group-prepend">
		                      				<span class="input-group-text">
		                      					<i class="icofont-money"></i>
		                      				</span>
		                      			</div>
		                      			<input type="text" class="form-control" placeholder="Increase / Decrease fuel's Price" style="border-right: 1px solid white;" readonly>
		                      			<input type="text" value="0" class="moneyToAddOrRemove" style="width: 20%; border-left: 0px; border-right:1px solid #D3D3D3; border-bottom: 1px solid #D3D3D3; border-top: 1px solid #D3D3D3; text-align: center; font-weight: bold;">
		                      		</div><div class="mb-2"><span class="moneyToAddOrRemove-message"></span></div>		   




		                      		<div class="input-group">
		                      			<div class="input-group-prepend">
		                      				<span class="input-group-text">
		                      					<b>QL</b>
		                      				</span>
		                      			</div>
		                      			<input type="text" class="form-control"  placeholder="Add Fuel Quantity To Existing One" style="border-right: 1px solid white;" readonly>

		                      			<input type="text" value="0" class="fuelToAddOn" style="width: 20%; border-left: 0px; border-right:1px solid #D3D3D3; border-bottom: 1px solid #D3D3D3; border-top: 1px solid #D3D3D3; text-align: center; font-weight: bold;">
		                      		</div><div class="mb-3"><span class="fuelToAddOn-message"></span></div>

		                      		<input type="hidden" class="form-control onFuelId" value="<?php echo @$_GET['fuelId'] ?>" name="">

		                      		<button class="btn btn-primary btn-block btnToModify">MODIFY FUEL</button>

	                      	 </li>


                        	</ul>



                      	</div>
                      	<div class="col-md-3"></div>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-2"></div>
                </div>

							<?php
							break;

							case 'viewMarked':
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
	                      					<th>Liters Remain</th>
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

							case 'viewToDayMarked':
							$yesrdayDate  =$toDayDate = date("d-m-Y");
							$otherFuelzRemained  = $spObject->selectToDaysRemarkedInformation($yesrdayDate);
							
							?>
							<div class="row">
								 <div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> View All Remarked  Fuel For To Day On <?php echo $yesrdayDate ?></b>

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
	                      					<th>Liters Remain</th>
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
				<!-- FUEL REPORT MANAGEMENT CONSUMED BY CLIENTS -->
							<?php	
							break;

							case 'makeFuelReport':
							$filterByPompiste = $spObject->selectPumpisteCollector($_SESSION['pompiste_usernename']);
							$filterByFuel     = $spObject->selectFuelHistory($_SESSION['pompiste_usernename']);
							$filterByPayment  = $spObject->selectPaymentHistory($_SESSION['pompiste_usernename']);
							?>
								<div class="row">
								 <div class="col-md-0"></div>
									<div class="col-md-12">
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
											<div class="section-title">
                          <h3 style="font-size: 23px;">
                              <center>
                                <b style="color: #e96b56;"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> Make Your Report Here</b>

                                <div class="row"><div class="col-sm-4"></div><div class="col-sm-4"><hr></div><div class="col-sm-4"></div></div>
                             </center> 
                          </h3>
                      </div><div class="mb-3"></div>


                       <input type="hidden" class="form-control myOwnAccount"  value="<?php echo $_SESSION['pompiste_usernename'] ?>">


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
                            <td><i class="fa fa-money"></i></td>
                            <td>
                              <a href="#"><select class="filter form-control filterByPayment"  style="border-left: none; border-bottom: none;border-top: none; height: 40px;width: 150px;">
                                <option> Filter By Payment&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                 <?php
                                   foreach ($filterByPayment as $key => $value) {
                                   ?>
                                    <option value="<?php echo $filterByPayment[$key]['paymentStatus'] ?>"><?php echo $filterByPayment[$key]['paymentStatus'] ?></option>
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
							
							<!-- filterBasedOnDate TASKS COMPLETED -->
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
					                                <b class="btn text-info"><img src="../icon/iconFuel.jpg" style="width: 45px;height: 45px;"> <b style="font-size: 25px;">ALL CLIENTS FROM YOUR  PUMP ATTENDANT</b></b>

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
																			<th>Liters Consumed</th>
																			<th>Total Amount</th>
																			<th>Status</th>
																			<th>Date</th>
																		</tr>
																	</thead>

																	<?php 
																		$selectAllClients  = $spObject->selectAllClientFromMyPompiste($_SESSION['pompiste_usernename']);
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
                </div>
							<?php
							break;

							default:
							?>
			
										<div class="shadow-lg p-3 mb-5 bg-light rounded">
										<center>
												<img src="../icon/sp_superv.jpg" class="" style="width: 80%; height: 80%;">
											</center>
										</div>
									
							<?php
							break;
						}
					 ?>
				</div>
				<div class="col-md-1"></div>
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


			function addPumpAttedant(){

				$(".btn-save-attendant").on("click",function(){
					
					let   pumpistFullName = $(".pumpistFullName").val();
					let   pumpistGender   = $(".pumpistGender").val();
					let   pumpistPhone    = $(".pumpistPhone").val();
					let   pumpistUsername = $(".pumpistUsername").val();
					let   pumpistPassword = $(".pumpistPassword").val();

					let stringRegex  = /^[A-Za-z]+$/;
					let integerRegex  = /^[0-9]+$/;


					if (pumpistFullName  == "") {
						$('.pumpistFullName-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Full Name Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistGender  == "Select Pump Attendant Gender") {
						$('.pumpistGender-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Gender Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPhone  == "") {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Phone Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (!pumpistPhone.match(integerRegex)) {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Phone Number  Must Be Integer Only</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPhone.length < 10) {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Too Low Phone Number,At Leats 10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPhone.length > 10) {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Too High Phone Number,At Least  10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistUsername  == "") {
						$('.pumpistUsername-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Login Username Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPassword  == "") {
						$('.pumpistPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Password  Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPassword.length < 6) {
						$('.pumpistPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Password  Must Be 6 Character And Above</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}else{

						$.ajax({
							method :"POST",
							url : "../spHundler.php?brilliant=registerNewPompuste",
							data : {
									pumpistFullName:pumpistFullName,
									pumpistGender : pumpistGender,
									pumpistPhone : pumpistPhone,
									pumpistUsername : pumpistUsername,
									pumpistPassword : pumpistPassword
							},

							success : function(response){
								let resp  = String(response);
								
								if (resp  == "Pumpiste_Registed") {
									window.location.href='supervisorDashboard.php?brilliant=addNewPompiste&status=pumpisteRegisted';
								}if (resp  == "Pumpiste_Not_Registed") {
									window.alert("Oooops ,Not Registed, Above Username Has Been Taken");
								}


							}
						});
					}


				});
			}


			function modifyPompisteAttendant(){

				$(".btn-update-attendant").on("click",function(){
					
					let   pumpistFullName = $(".pumpistFullName").val();
					let   pumpistGender   = $(".pumpistGender").val();
					let   pumpistPhone    = $(".pumpistPhone").val();
					let   pumpistUsername = $(".pumpistUsername").val();
					let   pumpistPassword = $(".pumpistPassword").val();

					let stringRegex  = /^[A-Za-z]+$/;
					let integerRegex  = /^[0-9]+$/;

					if (pumpistFullName  == "") {
						$('.pumpistFullName-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Full Name Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistGender  == "Select Pump Attendant Gender") {
						$('.pumpistGender-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Gender Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPhone  == "") {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Phone Is Required </b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (!pumpistPhone.match(integerRegex)) {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Phone Number  Must Be Integer Only</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPhone.length < 10) {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Too Low Phone Number,At Leats 10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPhone.length > 10) {
						$('.pumpistPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Too High Phone Number,At Least  10 digit</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistUsername  == "") {
						$('.pumpistUsername-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Login Username Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPassword  == "") {
						$('.pumpistPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Pump Attendant Password  Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}if (pumpistPassword.length < 6) {
						$('.pumpistPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Password  Must Be 6 Character And Above</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);	
	            return false;
					}else{

						$.ajax({

							method : "POST",
							url : "../spHundler.php?brilliant=updateExistingPompiste",
							data :{
										pumpistFullName:pumpistFullName,
										pumpistGender : pumpistGender,
										pumpistPhone : pumpistPhone,
										pumpistUsername : pumpistUsername,
										pumpistPassword : pumpistPassword
							},
							success: function(response){
								let resp  = String(response);

								if (resp  == "Pumpiste_Update") {
									window.location.href='supervisorDashboard.php?brilliant=addNewPompiste&status=pumpisteModify';
								}if (resp  == "Pumpiste_Not_Update") {
									window.alert("Oooops ,Not Update Try Again Latter");
								}

							}

						});
					}


				});
			}



			function modifyFuels(){
				$(".btnToModify").on("click",function(){
						let onFuelId  = $(".onFuelId").val();
						let selectActionOnFuel  = $(".selectActionOnFuel").val();
						let moneyToAddOrRemove  = $(".moneyToAddOrRemove").val();
						let fuelToAddOn  = $(".fuelToAddOn").val();

						let integerRegex = /^[0-9]+$/;

						if (selectActionOnFuel  == "Select Action On Price") {
								$('.selectActionOnFuel-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b> Please Select Action</b></i></center> </div> ");
		            window.setTimeout(function() {
		            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
		            $(this).remove(); 
		            });
		            }, 2500);	
		            return false;
						}
						if (!moneyToAddOrRemove.match(integerRegex)) {
								$('.moneyToAddOrRemove-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Money Should Be Integer Only </b></i></center> </div> ");
		            window.setTimeout(function() {
		            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
		            $(this).remove(); 
		            });
		            }, 2500);	
		            return false;
						}	if (!fuelToAddOn.match(integerRegex)) {
								$('.moneyToAddOrRemove-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px; font-size:14px;'><i><b>Fuel Liter Should Be Measured in Integer Only </b></i> </div> ");
		            window.setTimeout(function() {
		            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
		            $(this).remove(); 
		            });
		            }, 2500);	
		            return false;
						}else{

							$.ajax({
								method : "POST",
								url : "../spHundler.php?brilliant=modifyFuel",
								data :{
									onFuelId : onFuelId,
									fuelToAddOn : fuelToAddOn,
									selectActionOnFuel : selectActionOnFuel,
									moneyToAddOrRemove : moneyToAddOrRemove
								},
								success : function(response){
									let resp  = String(response);
									

									if (resp  == "Fuel_Updated") {
										window.location.href="supervisorDashboard.php?brilliant=viewFuelInTank&status=fuelUpdate";
									}if (resp  == "Fuel_Not_Updated") {
										window.alert("Ooops Failed To Update Fuel");
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
					 			myOwnAccount  : myOwnAccount
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


					 // window.alert(filteredDate);

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
					 let myOwnAccount     = $(".myOwnAccount").val();

					 $.ajax({
					 		method : "POST",
					 		url : "../spHundler.php?brilliant=filterBasedOnRangeOfDate",
					 		data :{
					 			filteredStarOn : filteredStarOn,
					 			filteredEndOn  : filteredEndOn,
					 			myOwnAccount   : myOwnAccount
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

			addPumpAttedant();
			modifyPompisteAttendant();
			modifyFuels();
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