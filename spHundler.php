<?php
session_start();

switch (@$_GET['brilliant']) {
	case 'userCanGetLogin':

	 function userloginProcess($username,$password,$loginTypes){ 

	 	$conn  = getConnectedToServer();
	 	if ($conn->tryToLoginAsPompiste($username,$password,$loginTypes)  == true) {
	 		$_SESSION['pompiste_usernename'] = $username;
	 		$message  = "welcome_dear";
	 		$dataResponse = array("status" =>$message,"loginType" =>$loginTypes);
	 	}else{
	 		$message = "Ooops_Oops";
	 		$dataResponse = array("status" =>$message);
	 	}
	 	echo json_encode($dataResponse);
	 }
	 userloginProcess($_POST['username'],$_POST['userPassword'],$_POST['loginTypes']);
	break;	


	case 'LoginAsManager':
	 function userloginProcess($managerUsername,$managerPassword){ 

	 	$conn  = getConnectedToServer();

	 	if ($conn->tryToLoginAsManager($managerUsername,$managerPassword)  == true) {
	 		$_SESSION['managerUsername'] = $managerUsername;
	 		echo $message  = "welcome_dear_Mananager";
	 		// $dataResponse = array("status" =>$message);
	 	}else{
	 		echo $message = "Ooops_Invalid_Password";
	 		// $dataResponse = array("status" =>$message);
	 	}
	 	// echo json_encode($dataResponse);
	 }
	 userloginProcess($_POST['username'],$_POST['passwordForManager']);
	break;

	case 'fetchAllDataRegardingToTheFuel':
		 
		 function fetchAllDataRegardingToTheFuel($fuelName){
		 	$conn  = getConnectedToServer();
		 	$infOnFuel   = $conn->tryToAccessAllInformationRegardToTheSelectedFuel($fuelName);
		 	$fuelPrice   = $infOnFuel[0]['flUnitPrice'];
		 	$fuelQuanity = $infOnFuel[0]['flQuantity'];
		 	$fuelRemain  = $infOnFuel[0]['flRemaining'];
		 	$fuelStatus  = $infOnFuel[0]['flStatus'];
		 	

		 	?>
		 		<div class="input-group">
                  <div class="input-group-prepend">
                       <span class="input-group-text"><i class="icofont-price"></i></span>
                  </div>
                  <input type="text" value="<?php echo $fuelPrice  ?> RWF" class="form-control cFuelPrice"  readonly>
                </div><div class="mb-2"><span class="cFuelPrice-message"></span></div>

                <div class="input-group">
                  <div class="input-group-prepend">
                       <span class="input-group-text"><i class="icofont-basket"></i></span>
                  </div>
                  <input type="text" value="<?php echo $fuelRemain  ?> L" class="form-control"  readonly>
                </div><div class="mb-2"><span class="cPlateNumber-message"></span></div> 

                <div class="input-group">
                  <div class="input-group-prepend">
                       <span class="input-group-text"><i class="icofont-water-drop"></i></span>
                  </div>
                  <input type="text"  class="form-control cConsumedLiters"  placeholder="Enter Consumed Quantity Liters">
                </div><div class="mb-2"><span class="cConsumedLiters-message"></span></div>
                <center><div class="toatlAmountInReturn"></div></center><div class="mb-2"></div>

                <input type="hidden" class="consumedFuel" value="<?php echo $fuelName ?>">
                <input type="hidden" class="remFuel" value="<?php echo $fuelRemain ?>">

                <button class="btn btn-primary btn-block btnForSaveClient"> <i class="fa fa-save"></i> Confirm & Save Record</button>
                <div class="mb-2"></div>
                <center><span class="actionMessage"></span></center>


                <script type="text/javascript">
                	$(document).ready(function(){

                		let literUserTake   = 0;
                		let fuelPrice       = "<?php echo $fuelPrice ?>";
                		let totalToPay  	= 0;
                		let numberValidate  = /^[0-9]+$/;
                		let remFuel 		= $(".remFuel").val();

                		function onKeyBeingWriten(){
 							
 							$(".cConsumedLiters").on("keyup",function(){
 								literUserTake  = $(this).val();
 								totalToPay     = literUserTake * fuelPrice;

 								if (literUserTake < 1) {
 								   $('.cConsumedLiters-message').html("<div class='mb-2'></div><div class='animated shake' id='sams1' style='height:45px;'><center><i> <b class='text text-warning'>Quantity Should Not Be 0</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
 								}

 								if (!literUserTake.match(numberValidate)) {
 									$('.cConsumedLiters-message').html("<div class='mb-2'></div><div class='animated shake' id='sams1' style='height:45px;'><center><i> <b class='text text-warning'>Quantity Should Be Number Only</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
 								}else{
 									$(".toatlAmountInReturn").html("<span class='badge badge-success' style='font-size:16px;'> &nbsp; "+totalToPay+" &nbsp;RWF</span>");
 								}

 							});
                		}


                		function saveAndMakeCalculationOfFuelTakenByClient(){
							$(".btnForSaveClient").on("click",function(){
								let fuelGetConsumed  = $(".consumedFuel").val();
								let cFullName  		 = $(".cFullName").val();
								let cPhone  		 = $(".cPhone").val();
								let cEmail  		 = $(".cEmail").val();
								let cVehicle  		 = $(".cVehicle").val();
								let cPlateNumber  	 = $(".cPlateNumber").val();
								let strValidate 	 = /^[a-zA-Z\s]*$/;
								let numberValidate   = /^[0-9]/;
								let remFuel 		 = parseInt($(".remFuel").val());
								
								if (cFullName  == "") {
									$('.cFullName-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Ooops Re-Type Again Client Name</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
								}if (!cFullName.match(strValidate)) {
								  $('.cFullName-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>I Said Client Names Must Be String Only</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(cPhone  == "") {
								  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>I Said Client Phone Number Is Required</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(!cPhone.match(numberValidate)){
								  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>I Said Client Phone Number Must Be Integer Only</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(cPhone.length < 10){
								  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;font-size:14px'><center><i> <b>I Said Too Few Client Phone Number  At Least 10 Digit</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(cPhone.length > 10){
								  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;font-size:14px'><center><i> <b>I Said Too High  Client Phone Number  At Least 10 Digit</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(cVehicle  == "Select Client Vehicle"){
								  $('.cVehicle-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>We Sugested You To Choose Client Vehicle</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(cEmail  == ""){
								  $('.cEmail-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Please Your Email Is Required</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(cPlateNumber == "") {
								  $('.cPlateNumber-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Re-Type Again Client Plate Number</b></i></center> </div> ");
								  window.setTimeout(function() {
								  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
								  $(this).remove(); 
								  });
								  }, 2500);
								  return false;
								}if(!literUserTake.match(numberValidate)) {
								  $('.cConsumedLiters-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b style='font-size:13px;'>Can Not Mix String & Number On,You Never Listen</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
								}if(literUserTake > remFuel) {
								  $('.cConsumedLiters-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i><b style='font-size:13px;'>Ooops We Don't Have Enough Liter In Fuel Tank</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
								}else{

									$.ajax({
										method : "POST",
										url    : "../spHundler.php?brilliant=addNewClient",
										data : {
											fuelGetConsumed : fuelGetConsumed,
											cFullName  	    : cFullName,
											cPhone			: cPhone,
											cVehicle	    : cVehicle,
											cPlateNumber    : cPlateNumber,
											literUserTake   : literUserTake,
											fuelPrice		: fuelPrice,
											remFuel			: remFuel,
											cEmail : cEmail

										},
										success : function(response){
										
										let resp  = String(response);

										// window.alert(resp);
										
										if (resp.substring(0,9)  == "Inserted") {									  
										  $(".btnForSaveClient").hide();
							                 $(".actionMessage").html("<center><div class='mb-3'></div><img src='../icon/Loader/Hourglass.gif' height='40px' width='40px' style='border-radius:100px;'><br> <b class='text text-dark' style='font-size:15px;text-shadow: 6px 8px 8px #000000;'> Try To Save Record , plz Wait...</b></center>");
							                  setTimeout("window.location.href='../user/userDashboard.php?brilliant=viewClient&status=cientAdded'",4000);

										}if(resp.substring(0,13)  == "FuelGoesToLow"){

									       $(".btnForSaveClient").hide();
							                 $(".actionMessage").html("<center><div class='mb-3'></div><img src='../icon/Loader/Hourglass.gif' height='40px' width='40px' style='border-radius:100px;'><br> <b class='text text-dark' style='font-size:15px;text-shadow: 6px 8px 8px #000000;'> Try To Save Record , plz Wait...</b></center>");
							                  setTimeout("window.location.href='../user/userDashboard.php?brilliant=viewClient&status=cientAddedWithLowerTank'",4000);

										}if(resp.substring(0,11)  == "NotInserted"){
										   window.alert("Ooops Something Went Wrong");
										}

										}
									});
								}
								
							});
						}

						//  Function Call 

						saveAndMakeCalculationOfFuelTakenByClient();
						onKeyBeingWriten();

                	});
                </script>

		 	<?php
		 }

		 fetchAllDataRegardingToTheFuel($_POST['fuelGetConsumed']);
	break;


	case 'fetchAllDataRegardingToTheFuelWhileUpdating':
		 
		 function fetchAllDataRegardingToTheFuel($fuelName){
		 	$conn  = getConnectedToServer();
		 	$idForData = $_POST['bookedId'];

		 	$infOnFuel   = $conn->tryToAccessAllInformationRegardToTheSelectedFuel($fuelName);
		 	$fuelPrice   = $infOnFuel[0]['flUnitPrice'];
		 	$fuelQuanity = $infOnFuel[0]['flQuantity'];
		 	$fuelRemain  = $infOnFuel[0]['flRemaining'];
		 	$fuelStatus  = $infOnFuel[0]['flStatus'];
		 	$dataCatched = $conn->tryToAccessInformationOfSingleClient($idForData);



		 	?>
		 		

                <div class="row">
                	<div class="col-md-1"></div>
                	<div class="col-md-10">
                		<div class="mb-2"></div>

                		<center><span class="badge badge-warning"> &nbsp;&nbsp;&nbsp; <?php echo $fuelName ?>'s Price : <?php echo $fuelPrice ?> RWF &nbsp;&nbsp;&nbsp;</span><center><div class="mb-2"></div>
                	    <ul class="list-group">
		                	<li class="list-group-item bg-info">CURRENT DATABASE SITUATION </li>

		                	<li class="list-group-item bg-light"><?php echo $dataCatched[0]['fuelConsumed'] ?>'s Unit Price <?php echo $dataCatched[0]['fuelPrice'] ?> RWF</li>

		                	<li class="list-group-item bg-light">Booked Fuel : <?php echo $dataCatched[0]['fuelLitle'] ?> L</li>
		                	<li class="list-group-item bg-light">Total Price : <?php echo $dataCatched[0]['total'] ?> RWF</li>
		                </ul>
                	</div>
                	<div class="col-md-1"></div>
                </div>

              
                <div class="mb-5"></div>


                <div class="input-group">
                  <div class="input-group-prepend">
                       <span class="input-group-text"><i class="icofont-water-drop"></i></span>
                  </div>
                  <input type="text"  value="<?php echo $dataCatched[0]['fuelLitle'] ?>" class="form-control cConsumedLiters"  placeholder="Enter Consumed Quantity Liters">
                </div><div class="mb-2"><span class="cConsumedLiters-message"></span></div>
                <center><div class="toatlAmountInReturn"></div></center><div class="mb-2"></div>


                <input type="hidden" class="consumedFuel" value="<?php echo $fuelName ?>">
                <input type="hidden" class="remFuel" value="<?php echo $fuelRemain ?>">
                <input type="hidden" class="fuelPricez" value="<?php echo $fuelPrice ?>">

                <button class="btn btn-warning btn-block btnForModifyClient"> <i class="fa fa-pencil"></i> Modify Record</button>
                <div class="mb-2"></div>
                <center><span class="actionMessage"></span></center>


                <script type="text/javascript">
                	$(document).ready(function(){

                		let literUserTake   = 0;
                		let fuelPrice       = "<?php echo $fuelPrice ?>";
                		let totalToPay  	= 0;
                		let numberValidate  = /^[0-9]+$/;
                		let remFuel 		= $(".remFuel").val();

                		function onKeyBeingWriten(){
 							
 							$(".cConsumedLiters").on("keyup",function(){
 								literUserTake  = $(this).val();
 								totalToPay     = literUserTake * fuelPrice;

 								if (literUserTake < 1) {
 								   $('.cConsumedLiters-message').html("<div class='mb-2'></div><div class='animated shake' id='sams1' style='height:45px;'><center><i> <b class='text text-warning'>Quantity Should Not Be 0</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
 								}

 								if (!literUserTake.match(numberValidate)) {
 									$('.cConsumedLiters-message').html("<div class='mb-2'></div><div class='animated shake' id='sams1' style='height:45px;'><center><i> <b class='text text-warning'>Quantity Should Be Number Only</b></i></center> </div> ");
									window.setTimeout(function() {
									$("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
									$(this).remove(); 
									});
									}, 2500);
									return false;
 								}else{
 									$(".toatlAmountInReturn").html("<span class='badge badge-success' style='font-size:16px;'> &nbsp; "+totalToPay+" &nbsp;RWF</span>");
 								}

 							});
                		}


                		function saveAndMakeCalculationOfFuelTakenByClient(){
							$(".btnForModifyClient").on("click",function(){
								let fuelGetConsumed  = $(".consumedFuel").val();
								let cFullName  		 = $(".cFullName").val();
								let cPhone  		 = $(".cPhone").val();
								let cVehicle  		 = $(".cVehicle").val();
								let cPlateNumber  	 = $(".cPlateNumber").val();
								let fuelPricez  	 = $(".fuelPricez").val();
								let strValidate 	 = /^[a-zA-Z\s]*$/;
								let numberValidate   = /^[0-9]/;
								let remFuel 		 = parseInt($(".remFuel").val());
								let bookedId		 = $(".bookedId").val();

								if (literUserTake  == 0) {
									literUserTake  = <?php echo  $dataCatched[0]['fuelLitle'] ?>;
								}else{
									literUserTake = literUserTake;
								}



									$.ajax({
										method : "POST",
										url    : "../spHundler.php?brilliant=updateExistingClient",
										data : {
											fuelGetConsumed : fuelGetConsumed,
											cFullName  	    : cFullName,
											cPhone			: cPhone,
											cVehicle	    : cVehicle,
											cPlateNumber    : cPlateNumber,
											literUserTake   : literUserTake,
											fuelPrice		: fuelPricez,
											remFuel			: remFuel,
											bookedId		: bookedId

										},
										success : function(response){
										   let resp  = String(response);
										 	
										 	if (resp  == "update") {

										 	 $(".btnForModifyClient").hide();
							                 $(".actionMessage").html("<center><div class='mb-3'></div><img src='../icon/Loader/Spinning_arrows.gif' height='40px' width='40px' style='border-radius:100px;'><br> <b class='text text-dark' style='font-size:15px;text-shadow: 6px 8px 8px #000000;'> Try To Modify Record , plz Wait...</b></center>");
							                  setTimeout("window.location.href='../user/userDashboard.php?brilliant=viewClient&status=clientInfoUpdated'",4000);

										 	}else{
										 		echo  
										 	}
										}
									});
								
								
							});
						}

						//  Function Call 

						saveAndMakeCalculationOfFuelTakenByClient();
						onKeyBeingWriten();

                	});
                </script>

		 	<?php
		 }

		 fetchAllDataRegardingToTheFuel($_POST['fuelGetConsumed']);
	break;

	case 'deleteClient':

		function deleteClientInfoFromMyDatabase($clientId){
			$conn  = getConnectedToServer();

			if ($conn->tryToDeleteClientFromTheSystem($clientId) == true) {
				header("location:user/userDashboard.php?brilliant=viewClient&status=clientTrashed");
			}else{
				echo "clientNOtDeleted";
			}

		}	
		deleteClientInfoFromMyDatabase(@$_GET['clientId']);

	break;


	case 'updateExistingClient':
				
		function updteExistingClientOnTable($cFullName,$cPhone,$cVehicle,$cPlateNumber,$fuelGetConsumed,$literUserTake,$fuelPrice,$bookedId){
			$conn  = getConnectedToServer();

			$total  = $literUserTake * $fuelPrice;

			if ( ($conn->tryToUpdateExistingClientOnTable($cFullName,$cPhone,$cVehicle,$cPlateNumber,$fuelGetConsumed,$literUserTake,$fuelPrice,$total,$bookedId) == true) ) {
				echo "update";
			}else{
				echo "updateNotUpdate";
			}
		}updteExistingClientOnTable($_POST['cFullName'],$_POST['cPhone'],$_POST['cVehicle'],$_POST['cPlateNumber'],$_POST['fuelGetConsumed'],$_POST['literUserTake'],$_POST['fuelPrice'],$_POST['bookedId']);


	break;
	case 'addNewClient':
		
		function addNewerClientOnTable($cFullName,$cPhone,$cVehicle,$cPlateNumber,$fuelGetConsumed,$literUserTake,$fuelPrice,$remFuel,$cEmail){
			$conn  = getConnectedToServer();

			$pumpAttendant  = $conn->selectAllInformationForPumpAttendant($_SESSION['pompiste_usernename']);
			$pumpAttendantBranch     = $pumpAttendant[0]['userAssignedBranch'];
			$pumpAttendantSupervised = $pumpAttendant[0]['SupervisedBy'];
			$supervisorInfo  = $conn->selectAllInformationForPumpAttendant($pumpAttendantSupervised);
			$superPhoneNumber  = $supervisorInfo[0]['userPhone'];
			$remainingFuel 	     = $remFuel  - $literUserTake;
			// echo $pumpAttendantSupervised;

			$fuelInfo = $conn->tryToAccessAllInformationRegardToTheSelectedFuel($fuelGetConsumed);
			// $remaiPercentage   = ceil(($remainingFuel * 100) / ($fuelInfo[0]['flQuantity']));

			if ( ($conn->tryToAddNewerClientOnTable($cFullName,$cPhone,$cVehicle,$cPlateNumber,$fuelGetConsumed,$literUserTake,$fuelPrice,$literUserTake * $fuelPrice,$_SESSION['pompiste_usernename'],date('Y-m-d'),$pumpAttendantBranch,$pumpAttendantSupervised,$cEmail) == true)  && ($conn->reduceTankAfterGivingClientFuel($remainingFuel,$fuelGetConsumed,$pumpAttendantSupervised) == true) ) {


				$remaiPercentage   = ceil(($remainingFuel * 100) / ($fuelInfo[0]['flQuantity']));


				 $remaiPercentage;

				 if ($remaiPercentage > 20) {
				 	echo "Inserted";
				 }else{
				 	
				     echo "FuelGoesToLow";

		     		$messaga  = "Dear Supervisor , Twabamenyeshaga Ko Fuel Zo Mu Bwoko Bwa ".$fuelInfo[0]['flName']." , Zigiye Gushira Muri Tank , Zigeze Kuri ".$remaiPercentage."% Yiziri Muri Tank";

					// $bossNumber = "0789239908";     		
					$bossNumber = $superPhoneNumber; 		
					$data = array(
					"sender"=>'BELOVED',
					"recipients"=>$bossNumber,
					"message"=>$messaga);

					$url = "https://www.intouchsms.co.rw/api/sendsms/.json";
					$data = http_build_query ($data);
					$username="Beloved ";
					$password="Be!0ved@321!!!";
					$ch = curl_init();
					curl_setopt($ch,CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
					curl_setopt($ch,CURLOPT_POST,true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
					$result = curl_exec($ch);
					$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					curl_close($ch);
					echo $result;
					echo $httpcode;
				 }


			}else{
				echo "NotInserted";
			}
		}addNewerClientOnTable($_POST['cFullName'],$_POST['cPhone'],$_POST['cVehicle'],$_POST['cPlateNumber'],$_POST['fuelGetConsumed'],$_POST['literUserTake'],$_POST['fuelPrice'],$_POST['remFuel'],$_POST['cEmail']);
	break;

	case 'paymentProcess':


		if (@$_GET['status']  == "failed") {
			$clientId = @$_GET['clientId'];
			header("location:user/userDashboard.php?brilliant=viewFullInfoAboutClient&status=ooopsNoMoney&clientId=".$clientId);
		}if (@$_GET['status']  == "successful") {
			// code...
		

		function approveClientPayment($clientId){
			$conn  = getConnectedToServer();

			if ($conn->tryToApproveClientPayment($clientId)) {

				 // require 'PHPMailerAutoload.php';
				 // require 'credential.php';
				 $dataForClient  = $conn->tryToAccessInformationOfSingleClient($clientId);
				 $emailForClient = $dataForClient[0]['cEmail'];
				 $charset = "1234567890";
    				 $InvoiceNumber = substr(str_shuffle($charset), 0,4);


				 


				 $message ='  <br>
				 <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">

							  <style>
						        body{
						            background-color: #e9ecef; 
						            margin: 0;
						            padding: 0;
						        }
						        h1,h2,h3,h4,h5,h6{
						            margin: 0;
						            padding: 0;
						        }
						        p{
						            margin: 0;
						            padding: 0;
						        }
						        .container{
						            width: 40%;
						            margin-right: auto;
						            margin-left: auto;
						        }
						        .brand-section{
						           background-color: #0d1033;
						           padding: 5px 20px;
						        }
						        .logo{
						            width: 50%;
						        }

						        .row{
						            display: flex;
						            flex-wrap: wrap;
						        }
						        .col-6{
						            width: 50%;
						            flex: 0 0 auto;
						        }
						        .text-white{
						            color: #fff;
						        }
						        .company-details{
						            float: right;
						            text-align: right;
						        }
						        .body-sectiona{
						            padding: 2px;
						            border: 2px solid gray;
						            background-color: white;
						            border-bottom: none;
						            box-shadow: 3px 3pxpx 3px 3px #e9ecef;
						        }.body-sectionb{
						            padding: 2px;
						            border: 2px solid gray;
						            background-color: white;
						            border-top: none;
						            border-radius: 0px 0px 10px 10px;
						            box-shadow: 3px 3px 3px 3px #e9ecef;
						        }
						        .heading{
						            font-size: 6px;
						            margin-bottom: 08px;
						        }
						        .sub-heading{
						            color: #262626;
						            margin-bottom: 05px;
						            font-family:  Times New Roman;
						        }
						        table{
						            background-color: #fff;
						            width: 80%;
						            border-collapse: collapse;
						            align-items: center;
						        }
						        table thead tr{
						            border: 1px solid #111;
						            background-color: #17a2b8;
						        }
						        table td {
						            vertical-align: middle !important;
						            text-align: center;
						        }
						        table th, table td {
						            padding-top: 08px;
						            padding-bottom: 08px;
						        }
						        .table-bordered{
						            /*box-shadow: 0px 0px 5px 0.5px gray;*/
						        }
						        .table-bordered td, .table-bordered th {
						            border: 1px solid #dee2e6;
						        }
						        .text-right{
						            text-align: end;
						        }
						        .w-20{
						            width: 20%;
						        }
						        .float-right{
						            float: right;
						        }
						        table th{
						        	color: white;
						        }

						        .list-group{
						        	border: 1 px solid gray;

						        }
						    </style>
						</head>
						<body>

						    <div class="container">
						        <div class="brand-section" style="border-radius: 10px 10px 0px 0px; padding:10px;">

						            <div class="row">
						                <div class="col-6">
						                   <span style="margin-left: 50px;"><h1></i><b style="color: skyblue;text-shadow: 1px 1px #ffffff;">S</b><b  style="color: yellow;text-shadow: 1px 1px #000;">P</b> <b style="color: white;">CLIENT_INVOICE</b></h1></span>
						                </div>
						              
						            </div>
						        </div>

						        <div class="body-sectiona">
						            <div class="row">
						                <div class="col-6">
						                    <h2 class="heading" style="font-family: Times New Roman; font-size: 19px;">Invoice No.:#'.$InvoiceNumber.'</h2>
						                    <p class="sub-heading" style="font-family: Times New Roman; font-size: 18px;"><b>Tracking No</b>. fabcart2025 </p>
						                    <p class="sub-heading" style="font-family: Times New Roman; font-size: 18px;"><b>Order Date</b>:'.$dataForClient[0]["date"].'</p>
						                    <p class="sub-heading" style="font-family: Times New Roman; font-size: 18px;"><b>Email Address</b>:'.$dataForClient[0]["cEmail"].'</p>
						                    <p class="sub-heading" style="font-family: Times New Roman; font-size: 18px;"><b>Client Name</b> : '.$dataForClient[0]['clientNames'].'</p>
						                </div>
						                
						            </div>
						        </div>

						        <div class="body-sectionb">
						        	  <br>
						        		<div class="" style="width: 600px; margin-left: 50px;"><center><hr  style="background-color: red;height: 3px; border: none;"></center></div><br>
						            <h3  style="color:#e96b56;margin-left: 60px; font-size:30px;"><b>Ordered Items</b></h3>
						          
						            <center><table class="table-bordered" style="margin-left:20px;">
						                <thead class="bg-info">
						                    <tr>
						                        <th>Product Name</th>
						                        <th class="w-20">Product Price</th>
						                        <th class="w-20">Quantity</th>
						                        <th class="w-20">Grand Total</th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr style="background-color: #f8f9fa;">
						                        <td>'.$dataForClient[0]['fuelConsumed'].'</td>
						                        <td>'.$dataForClient[0]['fuelPrice'].'</td>
						                        <td>'.$dataForClient[0]['fuelLitle'].'</td>
						                        <td>'.$dataForClient[0]['total'].'</td>
						                    </tr>
						                    <tr>
						                        <td colspan="3" class="text-right"><b style="font-family: Times New Roman;">SUB TOTAL</b></td>
						                        <td>'.$dataForClient[0]['total'].'</td>
						                    </tr>
						                    <tr style="background-color: #f8f9fa;">
						                        <td colspan="3" class="text-right" align="right"><b style="font-family: Times New Roman;">DISCOUNT</b></td>
						                        <td><b style="color: #e96b56">-15%</b></td>
						                    </tr> 

						                    <tr>
						                        <td colspan="3" class="text-right" align="right"><b style="font-family: Times New Roman;">TAX RATE</b></td>
						                        <td> 18%</td>
						                    </tr>
						                    <tr style="background-color: #f8f9fa;">
						                        <td colspan="3" class="text-right"><b style="font-family: Times New Roman;">BALANCE DUE</b></td>
						                        <td style="background-color: #e96b56;"> '.$dataForClient[0]['total'].' RWF</td>
						                    </tr>
						                </tbody>
						            </table></center>
						            <br>


						            <center><button class="btn btn-danger" style="background:#dc3545;height:35px; border-radius:10px; color: white;" onClick="window.print()"><i class="icofont-printer"></i> Print Now</button> | <a href="user/userDashboard.php?brilliant=viewClient&status=paymentApproved"><button class="btn btn-danger" style="background:#17a2b8;height:35px; border-radius:10px; color: white;"><i class="icofont-save"></i> Backward </button> </a></center>

						            
						            
						            
						        </div>
						          
						    </div><br><br>
						      ';

						    echo $message;
						  
						    include_once "test.php";
							
							// $mail = new PHPMailer;
							// $mail->SMTPDebug = 0;
							// $mail->isSMTP();
							// $mail->Host = 'smtp.gmail.com';
							// $mail->SMTPAuth = true;
							// $mail->Username = EMAIL;
							// $mail->Password = PASS;
							// $mail->Subject = 'Payment Invoice Approved';
							// $mail->SMTPSecure = 'tls';
							// $mail->Port = 587;                         
							// $mail->setFrom(EMAIL, 'Societe Petroliere');
							// $mail->addAddress($emailForClient); 
							// $mail->WordWrap = 50;

							// $mail->IsHTML(true);									
								
							// $mail->addReplyTo(EMAIL);
							// $mail->isHTML(true);
							// $mail->AddAttachment($file_name);                                 
							// $mail->Body = "Dear  ".$dataForClient[0]['clientNames']." This Is Your Customer Invoice Thank You For Corporate With Us";

							// if(!$mail->send()) {
							//     echo 'Message could not be sent.';
							//     echo 'Mailer Error: ' . $mail->ErrorInfo;

							// } else {
									// header("location:user/userDashboard.php?brilliant=viewClient&status=paymentApproved");
								    echo "";
							// }
							// unlink($file_name);
           		    	
			}else{
				echo "Payment Not Aproved";
			}
		}
		approveClientPayment(@$_GET['clientId']);

		}
	break;

	case 'addRemainingFuel':

		function markToDayMarkForTommorwoAttendance($fuelName,$fuelRemainingQuantity,$onPompiste){
			$conn  = getConnectedToServer();
		     $toDayDate  = date("d-m-Y");
			// echo $onPompiste;

			$data  = $conn->didThePompisteMarkTheRemainigOIfToDayAttendance($fuelName,$toDayDate,$onPompiste);

			$dataForPompist  = $conn->tryToFetchToDaysDataBasedOnFuelsSoldedByUser($fuelName,$toDayDate,$onPompiste);

			$totalAmount = 0;
			foreach ($dataForPompist as $key => $value) {
			$totalAmount  += $dataForPompist[$key]['total'];
			}
			$totalAmount;



			$asksByMaSelf  = $conn->didYouToDaySellToDayThisFuel($fuelName,$toDayDate,$onPompiste);

			if ($asksByMaSelf > 0) {
			   if ($data > 0) {
			
				echo "Dear ".$_SESSION['pompiste_usernename']." Already You Have Marked To Day Fuel ";
				header("location:user/userDashboard.php?brilliant=viewInTank&status=alreadyRemarket&fuelName=".$fuelName);
			}else{
			     if ($conn->markThePomisteThatSheOrHeMarkToDayRemanining($fuelName,$fuelRemainingQuantity,$toDayDate,$totalAmount,$onPompiste) == true) {
					header("location:user/userDashboard.php?brilliant=viewInTank&status=fuelMarkedAsSell&fuelName=".$fuelName);
				}else{
					echo "<script>window.alert('Yallah SomethingWent Wrong Please Contact Admnistrator');window.location='user/userDashboard.php?brilliant=viewInTank';</script>";
				}
			}
			}else{
				header("location:user/userDashboard.php?brilliant=viewInTank&status=ooopNotSellAnythin&fuelName=".$fuelName);
			}
			




		}
		markToDayMarkForTommorwoAttendance(@$_GET['fuelName'],@$_GET['fuelRemainingQuantity'],@$_GET['clientAccount']);

	break;

	case 'trashOut':
		 session_destroy();
		 echo "<script>window.alert('Your Session Destroyed Successfull');window.location='index.html';</script>";
	break;

	case 'deletePumpiste':

		$conn  = getConnectedToServer();

		if ($conn->deletePumpisteFromTheTable(@$_GET['pumpUsername']) == true) {
			header("location:supervisor/supervisorDashboard.php?brilliant=addNewPompiste&status=pumpisteDeleted");
		}else{
			echo "Ooops";
		}
	break;

	case 'registerNewPompuste':

		function setregisterNewClientPompiste($pumpistFullName,$pumpistGender,$pumpistPhone,$pumpistUsername,$pumpistPassword){

			$conn  = getConnectedToServer();

			$supervisorInfo  = $conn->selectAllInformationForPumpAttendant($_SESSION['pompiste_usernename']);

			if($conn->tryToRegisterNewClientPompiste($pumpistFullName,$pumpistGender,$pumpistPhone,$pumpistUsername,$pumpistPassword,$supervisorInfo[0]['userAssignedBranch'],$supervisorInfo[0]['userName'])  == true ){
				echo "Pumpiste_Registed";
			}else{
				echo "Pumpiste_Not_Registed";
			}



		}setregisterNewClientPompiste($_POST['pumpistFullName'],$_POST['pumpistGender'],$_POST['pumpistPhone'],$_POST['pumpistUsername'],$_POST['pumpistPassword']);


	break;

	case 'updateExistingPompiste':
		function getUpdateexistingPompiste($pumpistFullName,$pumpistGender,$pumpistPhone,$pumpistUsername,$pumpistPassword){

			$conn  = getConnectedToServer();

			if($conn->tryToModifyExistingPompiste($pumpistFullName,$pumpistGender,$pumpistPhone,$pumpistPassword,$pumpistUsername)  == true ){
				echo "Pumpiste_Update";
			}else{
				echo "Pumpiste_Not_Update";
			}



		}getUpdateexistingPompiste($_POST['pumpistFullName'],$_POST['pumpistGender'],$_POST['pumpistPhone'],$_POST['pumpistUsername'],$_POST['pumpistPassword']);

	break;

	case 'modifyFuel':
		function getModifyExistingFuelInTheTank($onFuelId,$fuelToAddOn,$selectActionOnFuel,$moneyToAddOrRemove){ $conn  = getConnectedToServer();

			$dataOnFuel = $conn->selectFuelInTheTank($onFuelId);
			$existingPrice = $dataOnFuel[0]['flUnitPrice'];
			$existingQuaty = $dataOnFuel[0]['flQuantity'];
			$existingReman = $dataOnFuel[0]['flRemaining'];

			$nowPrice  = 0;
			$nowFuel   = 0;
			$nowRem   = 0;

			if ($selectActionOnFuel  == "Increase Price") {
				$nowPrice  = $existingPrice + $moneyToAddOrRemove;
			}else if ($selectActionOnFuel  == "Decrease Price") {
				$nowPrice  = $existingPrice - $moneyToAddOrRemove;
			}else if ($selectActionOnFuel  == "No Action") {
				$nowPrice  = $existingPrice + $moneyToAddOrRemove;
			}

			if ($fuelToAddOn  == 0) {
				$nowFuel       = $existingQuaty + $fuelToAddOn;
				$nowRem       = $existingReman + $fuelToAddOn;
			}else{
				$nowFuel   = $existingQuaty + $fuelToAddOn;
				$nowRem       = $existingReman + $fuelToAddOn;
			}

			

			if ($conn->setModifyExistingFuelInTheTank($onFuelId,$nowPrice,$nowFuel,$nowRem) == true) {
				echo "Fuel_Updated";
			}else{
				echo "Fuel_Not_Updated";
			}


		}

		getModifyExistingFuelInTheTank($_POST['onFuelId'],$_POST['fuelToAddOn'],$_POST['selectActionOnFuel'],$_POST['moneyToAddOrRemove'],);
	break;

	case 'filterBasedOnPompist':
		$conn  = getConnectedToServer();

		$myOwnAccount = $_POST['myOwnAccount'];
		$infoGatheredByPompiste  = $conn->selectFilteredDataByPompisteName($_POST['filterByUsers'],$myOwnAccount);
	?>

		<div class="mb-5"></div>

		<div class="row">
			<div class="col-md-2">
				<form action="../makingAllReport.php?brilliant=reportBasedOnUser&pompisteUsername=<?php echo $_POST['filterByUsers'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excell Sheet</button>
				</form>
			</div>
			<div class="col-md-8"> <h4><b>List Of Cliens Collected By Pump Attendant <b style="color: #e96b56;"><?php echo $_POST['filterByUsers'];  ?></h4></b></b></div>

			<div class="col-md-2">

				<form action="../generatePdfFile.php?brilliant=reportBasedOnUser&pompisteUsername=<?php echo $_POST['filterByUsers'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">

				<button class="btn btn-danger"><i class="fa fa-file-pdf-o"> Pdf File</i></button>


				</form>


				
			</div>
		</div><div class="mb-4"></div>

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
				$no  = 0;
				foreach ($infoGatheredByPompiste as $key => $value) {
				$no += 1;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['clientNames'] ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['doneby'] ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['clientvehicleType'] ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['clientVehiclePlate'] ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['fuelConsumed'] ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['fuelPrice'] ?> RWF</td>
						<td><?php echo $infoGatheredByPompiste[$key]['fuelLitle'] ?> L</td>
						<td><?php echo $infoGatheredByPompiste[$key]['total'] ?> RWF</td>
						<td><?php  

								if($infoGatheredByPompiste[$key]['paymentStatus'] == "no_payment"){
								?>
								  <span class="badge badge-danger">Not Yet Paid</span>
								<?php
								}else{
								?>
								   <span class="badge badge-success">Paid Successfull</span>
								<?php
								} ?></td>
						<td><?php echo $infoGatheredByPompiste[$key]['date'] ?> </td>

					</tr>
				<?php
				}
			 ?>
		</table>

	<?php
	break;	



	case 'filterBasedOFuel':
		$conn  = getConnectedToServer();
		$myOwnAccount = $_POST['myOwnAccount'];
		$infoGatheredAccordingToFuel  = $conn->selectFilteredDataBySelectedFuel($_POST['filterByFuel'],$myOwnAccount);
	?>

		<div class="mb-5"></div>

		<div class="row">
			<div class="col-md-2">
				<form action="../makingAllReport.php?brilliant=reportBasedOnFuelTaken&fuelName=<?php echo $_POST['filterByFuel'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excell Sheet</button>
				</form>
			</div>
			<div class="col-md-8"> <h4><b>Filtered List According To Fuel They Bought , Fuel Named <b style="color: #e96b56;"><?php echo $_POST['filterByFuel'];  ?></h4></b></b></div>

			<div class="col-md-2">
				<form action="../generatePdfFile.php?brilliant=reportBasedOnFuelTaken&fuelName=<?php echo $_POST['filterByFuel'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>  Pdf File</button>
				</form>
			</div>
		</div><div class="mb-4"></div>

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
				$no  = 0;
				foreach ($infoGatheredAccordingToFuel as $key => $value) {
				$no += 1;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['clientNames'] ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['doneby'] ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['clientvehicleType'] ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['clientVehiclePlate'] ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['fuelConsumed'] ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['fuelPrice'] ?> RWF</td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['fuelLitle'] ?> L</td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['total'] ?> RWF</td>
						<td><?php  

								if($infoGatheredAccordingToFuel[$key]['paymentStatus'] == "no_payment"){
								?>
								  <span class="badge badge-danger">Not Yet Paid</span>
								<?php
								}else{
								?>
								   <span class="badge badge-success">Paid Successfull</span>
								<?php
								} ?></td>
						<td><?php echo $infoGatheredAccordingToFuel[$key]['date'] ?> RWF</td>

					</tr>
				<?php
				}
			 ?>
		</table>

	<?php
	break;


	case 'filterBasedOnPayment':
		$conn  = getConnectedToServer();
		$myOwnAccount = $_POST['myOwnAccount'];
		$infoGatheredAccordingToPayment  = $conn->selectFilteredDataByPaymentStatus($_POST['filterByPayment'],$myOwnAccount);
	?>

		<div class="mb-5"></div>

		<div class="row">
			<div class="col-md-2">
				<form action="../makingAllReport.php?brilliant=reportBasedOnPaymentStatus&paymentMode=<?php echo $_POST['filterByPayment'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excell Sheet</button>
				</form>
			</div>
			<div class="col-md-8"> <h4><b>List Of Clients Whose They Payment Status <b>

				<?php if($_POST['filterByPayment'] == "payment_approved"){
				?>
					<b class="text text-success"> Approved</b>
				<?php
				}else{
				?>
					<b class="text text-danger"> Not Payed</b>
				<?php
				}  ?></h4></b></b></div>

			<div class="col-md-2">
				<form action="../generatePdfFile.php?brilliant=reportBasedOnPaymentStatus&paymentMode=<?php echo $_POST['filterByPayment'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i>  Pdf File</button>
				</form>
			</div>
			</div>

		<div class="mb-4"></div>

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
					<th>date</th>
				</tr>
			</thead>

			<?php
				$no  = 0;
				foreach ($infoGatheredAccordingToPayment as $key => $value) {
				$no += 1;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['clientNames'] ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['doneby'] ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['clientvehicleType'] ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['clientVehiclePlate'] ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['fuelConsumed'] ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['fuelPrice'] ?> RWF</td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['fuelLitle'] ?> L</td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['total'] ?> RWF</td>
						<td><?php  

								if($infoGatheredAccordingToPayment[$key]['paymentStatus'] == "no_payment"){
								?>
								  <span class="badge badge-danger">Not Yet Paid</span>
								<?php
								}else{
								?>
								   <span class="badge badge-success">Paid Successfull</span>
								<?php
								} ?></td>
						<td><?php echo $infoGatheredAccordingToPayment[$key]['date'] ?> RWF</td>
					</tr>
				<?php
				}
			 ?>
		</table>

	<?php
	break;



	case 'filterBasedOnDatePurchased':
		$conn  = getConnectedToServer();
		$myOwnAccount = $_POST['myOwnAccount'];
		$infoGatheredAccordingToDate  = $conn->selectFilteredDataByDatePurchsed($_POST['filteredDate'],$myOwnAccount);

		// echo $_POST['filteredDate'];
	?>
		<div class="mb-5"></div>

		<div class="row">
			<div class="col-md-2">
				<form action="../makingAllReport.php?brilliant=reportBasedOnDate&dateOnAction=<?php echo $_POST['filteredDate'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-success"><i class="fa fa-file-excel-o"></i>Excell Sheet</button>
				</form>
			</div>
			<div class="col-md-8"> <h4><b>List Of Clients Whose Bought Fuels On <b class="text text-info"><?php echo $_POST['filteredDate']; ?></b></h4></div>
			 <div class="col-md-">
				<form action="../generatePdfFile.php?brilliant=reportBasedOnDate&dateOnAction=<?php echo $_POST['filteredDate'] ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Pdf File</button>
				</form>
		</div>
		  </div>
		 
		<div class="mb-4"></div>



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
					<th>date</th>
				</tr>
			</thead>

			<?php
				$no  = 0;
				foreach ($infoGatheredAccordingToDate as $key => $value) {
				$no += 1;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['clientNames'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['doneby'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['clientvehicleType'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['clientVehiclePlate'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['fuelConsumed'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['fuelPrice'] ?> RWF</td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['fuelLitle'] ?> L</td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['total'] ?> RWF</td>
						<td><?php  

								if($infoGatheredAccordingToDate[$key]['paymentStatus'] == "no_payment"){
								?>
								  <span class="badge badge-danger">Not Yet Paid</span>
								<?php
								}else{
								?>
								   <span class="badge badge-success">Paid Successfull</span>
								<?php
								} ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['date'] ?> RWF</td>
					</tr>
				<?php
				}
			 ?>
		</table>

	<?php
	break;	


	case 'filterBasedOnRangeOfDate':
		$conn  = getConnectedToServer();
		$myOwnAccount = $_POST['myOwnAccount'];
		$infoGatheredAccordingToDate  = $conn->selectFilteredRangeOfDate($_POST['filteredStarOn'],$_POST['filteredEndOn'],$myOwnAccount);
	?>
		<div class="mb-5"></div>

		<div class="row">
			<div class="col-md-2">
				<form action="../makingAllReport.php?brilliant=reportBasedOnRangeOfDate&startOndate=<?php echo $_POST['filteredStarOn'] ?>&endOfDate=<?php echo $_POST['filteredEndOn']; ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excell Sheet</button>
				</form>
			</div>
			<div class="col-md-8"> <h4><b>List Of Clients Whose Bought Fuels From  <b class="text text-warning"><?php echo $_POST['filteredStarOn']; ?></b> to <b class="text text-warning"><?php echo $_POST['filteredEndOn']; ?></b></h4></div>

			<div class="col-md-">
			<form action="../generatePdfFile.php?brilliant=reportBasedOnRangeOfDate&startOndate=<?php echo $_POST['filteredStarOn'] ?>&endOfDate=<?php echo $_POST['filteredEndOn']; ?>&myOwnAccount=<?php echo $myOwnAccount ?>" method="post">
				<button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Pdf File</button>
				</form>
		</div>
		</div>

		
		
		<div class="mb-4"></div>

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
				$no  = 0;
				foreach ($infoGatheredAccordingToDate as $key => $value) {
				$no += 1;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['clientNames'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['doneby'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['clientvehicleType'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['clientVehiclePlate'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['fuelConsumed'] ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['fuelPrice'] ?> RWF</td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['fuelLitle'] ?> L</td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['total'] ?> RWF</td>
						<td><?php  

								if($infoGatheredAccordingToDate[$key]['paymentStatus'] == "no_payment"){
								?>
								  <span class="badge badge-danger">Not Yet Paid</span>
								<?php
								}else{
								?>
								   <span class="badge badge-success">Paid Successfull</span>
								<?php
								} ?></td>
						<td><?php echo $infoGatheredAccordingToDate[$key]['date'] ?> RWF</td>
					</tr>
				<?php
				}
			 ?>
		</table>

	<?php
	break;

	case 'addNewSupervisor':
	
		function addNewerSupervisor($superNames,$superGender,$superPhone,$superUsername,$superPassword,$superBranch){
			$conn  = getConnectedToServer();


			if( $conn->tryToRegisterNewSupervisor($superNames,$superGender,$superPhone,$superUsername,$superPassword,$superBranch,$_SESSION['managerUsername'])  == true ) {
				$conn->defaultSpStation("Premium","3000","1000","1000",$superUsername);
				$conn->defaultSpStation("Kerosene","840","1000","1000",$superUsername);
				$conn->defaultSpStation("Diesel","1140","1000","1000",$superUsername);
				echo "supervisorCreated";
			}else{
				echo "supervisorNotCreated";
			}


		}

		addNewerSupervisor($_POST['superNames'],$_POST['superGender'],$_POST['superPhone'],$_POST['superUsername'],$_POST['superPassword'],$_POST['superBranch']);

	break;

	case 'modifyExistingSupervisor':
	
		function modifyExistingSupervisor($superNames,$superGender,$superPhone,$superUsername,$superPassword,$superBranch,$superId){
			$conn  = getConnectedToServer();


			if( $conn->tryToModifyExistinSupervisor($superNames,$superGender,$superPhone,$superUsername,$superPassword,$superBranch,$superId)  == true ) {
				echo "supervisorModified";
			}else{
				echo "supervisorNotModified";
			}


		}

		modifyExistingSupervisor($_POST['superNames'],$_POST['superGender'],$_POST['superPhone'],$_POST['superUsername'],$_POST['superPassword'],$_POST['superBranch'],$_POST['superId']);

	break;

	case 'deletedSupervisor':

		function  deleteSupervisor($superId){
			$conn  = getConnectedToServer();

			if ($conn->deleteSuperFromSyteme($superId)  == TRUE) {
				header("location:manager/managerDashboard.php?brilliant=viewAllSupervisor&status=supervisorDeleted");
			}
		}
		deleteSupervisor(@$_GET['superId']);

	break;
	
	default:
		// code...
	break;
}




function getConnectedToServer(){
	include 'spClass.php';
	return $spObject  = new  spClass();
	$message  = "";
	$dataResponse  = array();
}
?>