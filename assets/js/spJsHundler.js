
$(document).ready(function(){

	function userCanGetLogin(){

		$(".btn-btnForUser").on("click",function(){
			
			let username  	  = $(".userAssignedUsername").val();
			let userPassword  = $(".userAssignedPassword").val();
			let loginTypes  = $(".loginTypes").val();


			if (username  =="") {
				$('.userAssignedUsername-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Your Username Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);
			}if (userPassword  =="") {
				$('.userAssignedPassword-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Your Password Is Required</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);
			}if (loginTypes  =="Who Are You") {
				$('.loginTypes-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Select Login Type</b></i></center> </div> ");
	            window.setTimeout(function() {
	            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
	            $(this).remove(); 
	            });
	            }, 2500);
			}else{

				$.ajax({
					method : "POST",
					url : "spHundler.php?brilliant=userCanGetLogin",
					cache:true,
                  	dataType:"json",
					data: {
						username : username,
						userPassword : userPassword,
						loginTypes : loginTypes
					},
					
					success : function(response){
						let respMsgStatus  = response.status;
						let respLoginKind  = response.loginType;
						
						if (respMsgStatus  == "welcome_dear") {

							if (respLoginKind  == "Supervisor") {
								 $(".btnCover").hide();
								 $(".btn-btnForUser").hide();
				                 $(".customized-message").html("<center><div class='mb-3'></div><img src='icon/Loader/loader2.gif' height='40px' width='40px' style='border-radius:100px;'><br> <b class='text text-dark' style='font-size:15px;text-shadow: 6px 8px 8px #000000;'> Please Wait...</b></center>");
				                  setTimeout("window.location.href='supervisor/supervisorDashboard.php'",4000);
							}if (respLoginKind  == "Pump Attendant") {
							     $(".btnCover").hide();
								 $(".btn-btnForUser").hide();
				                 $(".customized-message").html("<center><div class='mb-3'></div><img src='icon/Loader/loader6.gif' height='40px' width='40px' style='border-radius:100px;'><br> <b class='text text-dark' style='font-size:15px;text-shadow: 6px 8px 8px #000000;'> Please Wait...</b></center>");
				                  setTimeout("window.location.href='user/userDashboard.php'",4000);	
							}
						
						}if(respMsgStatus  == "Ooops_Oops") {
							$('.customized-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Ooops Invalid Credential</b></i></center> </div> ");
				            window.setTimeout(function() {
				            $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
				            $(this).remove(); 
				            });
				            }, 2500);
						}
					}
				});
			}
		});

	}

	function fetchDatRegardOnTheFuel(){
		$(".cConsumedFuel").on("change",function(){
			let fuelGetConsumed  = $(this).val();
			let cFullName  		 = $(".cFullName").val();
			let cPhone  		 = $(".cPhone").val();
			let cEmail  		 = $(".cEmail").val();
			let cVehicle  		 = $(".cVehicle").val();
			let cPlateNumber  	 = $(".cPlateNumber").val();
			let strValidate 	 = /^[a-zA-Z\s]*$/;
			let numberValidate   = /^[0-9]/;

			if (cFullName  == "") {
			  $('.cFullName-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Client Full Name Is Required</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if (!cFullName.match(strValidate)) {
			  $('.cFullName-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Client Names Must Be String Only</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(cPhone  == "") {
			  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Client Phone Number Is Required</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(!cPhone.match(numberValidate)){
			  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Client Phone Number Must Be Integer Only</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(cPhone.length < 10){
			  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;font-size:14px'><center><i> <b>Too Few Client Phone Number  At Least 10 Digit</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(cPhone.length > 10){
			  $('.cPhone-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;font-size:14px'><center><i> <b>Too High  Client Phone Number  At Least 10 Digit</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(cVehicle  == "Select Client Vehicle"){
			  $('.cVehicle-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Please Select Client Vehicle</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(cEmail  == ""){
			  $('.cEmail-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Client Email Is Required</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if(cVehicle  == "Select Client Vehicle"){
			  $('.cVehicle-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Please Select Client Vehicle</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if (cPlateNumber == "") {
			  $('.cPlateNumber-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Please Enter Client Plate Number</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  return false;
			}if (fuelGetConsumed == "Select Fuel Consumed") {
			  $('.cConsumedFuel-message').html("<div class='mb-2'></div><div class='alert alert-danger animated shake' id='sams1' style='height:45px;'><center><i> <b>Please Select Consumed Fuel</b></i></center> </div> ");
			  window.setTimeout(function() {
			  $("#sams1").fadeTo(2000, 0).slideUp(2000, function(){
			  $(this).remove(); 
			  });
			  }, 2500);
			  $(".fuelInfo").hide();
			  return false;
			}else{
				$(".fuelInfo").show();
				$.ajax({
					method : "POST",
					url : "../spHundler.php?brilliant=fetchAllDataRegardingToTheFuel",
					data : {
						fuelGetConsumed : fuelGetConsumed
					},
					success : function(response){
					  $(".fuelInfo").html(response);
					}
				});
			}
		});
	}


	//  Function Calling

	userCanGetLogin();
	fetchDatRegardOnTheFuel();
});