<?php 
	
	include 'connection.php';
	class spClass  extends connection{

		private $conn  = null;
		private $query   = null;
		private $statement   = null;


		public function __construct(){
			try {

				$dbConn  = new connection();
				$this->conn = $dbConn->connectingToServer();
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function tryToLoginAsPompiste($username,$userPassword,$loginTypes){
			try {
				 $this->query  = "select * from users where userName =? and userPassword=? and userRole=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$username);
				 $this->statement->bindParam(2,$userPassword);
				 $this->statement->bindParam(3,$loginTypes);
				 $this->statement->execute();
				 
				 if ($this->statement->rowCount() > 0) {
				 	return true;
				 }else{
				 	return false;
				 }

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function tryToLoginAsManager($username,$userPassword){
			try {
				 $this->query  = "select * from spmanager where ManagerUsername =? and ManagerPassword=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$username);
				 $this->statement->bindParam(2,$userPassword);
				 $this->statement->execute();
				 
				 if ($this->statement->rowCount() > 0) {
				 	return true;
				 }else{
				 	return false;
				 }

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function tryToAccessClientListFor2Days($todayDate,$doneBy){
			try {
				$this->query  = "select * from clients where date =? and doneby=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$todayDate);
				 $this->statement->bindParam(2,$doneBy);
				 $this->statement->execute();
				 $arrayOfClient[]  = array();

				 while ($data  = $this->statement->fetchAll()) {
				 	$arrayOfClient  = $data;
				 }
				 return $arrayOfClient;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function tryToAccessClientRecentListoForOurClient($doneBy){
			try {
				$this->query  = "select * from clients where doneby=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$doneBy);
				 $this->statement->execute();
				 $arrayOfClient[]  = array();

				 while ($data  = $this->statement->fetchAll()) {
				 	$arrayOfClient  = $data;
				 }
				 return $arrayOfClient;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function tryToAccessInformationOfSingleClient($clientId){
			try {
				$this->query  = "select * from clients where clientld  =?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$clientId);
				 $this->statement->execute();
				 $arrayOfClient[]  = array();

				 while ($data  = $this->statement->fetchAll()) {
				 	$arrayOfClient  = $data;
				 }
				 return $arrayOfClient;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function checkIfWhereThereIsAnyClientFor2day($todayDate,$pumpistUsername){
			try {
				$this->query  = "select * from clients where date =? and doneby=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$todayDate);
				 $this->statement->bindParam(2,$pumpistUsername);
				 $this->statement->execute();
				 return $this->statement->rowCount();

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function tryToAccessfuelInTheStock($superUsername){
			try {
				 $this->query  = "select * from fuelatsp where fldoneBy=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$superUsername);
				 $this->statement->execute();
				 $arrayOfFuel  = array();

				 while ($data  = $this->statement->fetchAll()) {
				 	$arrayOfClient  = $data;
				 }
				 return $arrayOfClient;
						
			}catch (Exception $e) {
				echo $e->getMessage();
			}		
		}		

		public function tryToAccessAllInformationRegardToTheSelectedFuel($fuelName){
			try {
				 $this->query  = "select * from fuelatsp where flName =?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$fuelName);
				 $this->statement->execute();
				 $arrayOfFuel  = array();

				 while ($data  = $this->statement->fetchAll()) {
				 	$arrayOfClient  = $data;
				 }
				 return $arrayOfClient;
						
			}catch (Exception $e) {
				echo $e->getMessage();
			}		
		}		

		public function tryToAddNewerClientOnTable($cFullName,$cPhone,$cVehicle,$cPlateNumber,$fuelGetConsumed,$literUserTake,$fuelPrice,$total,$doneBy,$atDate,$pumpAttendantBranch,$pumpAttendantSupervised,$cEmail){
			try {
				 $this->query  = "insert into clients set clientNames=?,clientPhone=?,clientvehicleType=?,clientVehiclePlate=?,fuelConsumed=?,fuelLitle=?,fuelPrice=?,total=?,doneby=?,date=?,spBranch=?,supervisorAccount=?,cEmail=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$cFullName);
				 $this->statement->bindParam(2,$cPhone);
				 $this->statement->bindParam(3,$cVehicle);
				 $this->statement->bindParam(4,$cPlateNumber);
				 $this->statement->bindParam(5,$fuelGetConsumed);
				 $this->statement->bindParam(6,$literUserTake);
				 $this->statement->bindParam(7,$fuelPrice);
				 $this->statement->bindParam(8,$total);
				 $this->statement->bindParam(9,$doneBy);
				 $this->statement->bindParam(10,$atDate);
				 $this->statement->bindParam(11,$pumpAttendantBranch);
				 $this->statement->bindParam(12,$pumpAttendantSupervised);
				 $this->statement->bindParam(13,$cEmail);
				 
				 if ($this->statement->execute()) {
				 	return true;
				 }else{
				 	return false;
				 }
				 

						
			}catch (Exception $e) {
				echo $e->getMessage();
			}		
		}		


		public function tryToUpdateExistingClientOnTable($cFullName,$cPhone,$cVehicle,$cPlateNumber,$fuelGetConsumed,$literUserTake,$fuelPrice,$total,$bookedId){
			try {
				 $this->query  = "update clients set clientNames=?,clientPhone=?,clientvehicleType=?,clientVehiclePlate=?,fuelConsumed=?,fuelLitle=?,fuelPrice=?,total=? where clientld =?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$cFullName);
				 $this->statement->bindParam(2,$cPhone);
				 $this->statement->bindParam(3,$cVehicle);
				 $this->statement->bindParam(4,$cPlateNumber);
				 $this->statement->bindParam(5,$fuelGetConsumed);
				 $this->statement->bindParam(6,$literUserTake);
				 $this->statement->bindParam(7,$fuelPrice);
				 $this->statement->bindParam(8,$total);
				 $this->statement->bindParam(9,$bookedId);

				 if ($this->statement->execute()) {
				 	return true;
				 }else{
				 	return false;
				 }
				 

						
			}catch (Exception $e) {
				echo $e->getMessage();
			}		
		}


		public function selectAllInformationForPumpAttendant($pumpAttendant){
			try {
				 $this->query  = "select * from users where userName =?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$pumpAttendant);
				 $this->statement->execute();
				 $arrayOfPumpAttendant  = array();

				 while ($data  = $this->statement->fetchAll()) {
				 	$arrayOfPumpAttendant  = $data;
				 }
				 return $arrayOfPumpAttendant;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		

		public function reduceTankAfterGivingClientFuel($fuelRemaining,$FuelName,$fuelAddedBy){
			try {
				 $this->query  = "update fuelatsp set flRemaining=? where flName  =? and fldoneBy=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$fuelRemaining);
				 $this->statement->bindParam(2,$FuelName);
				 $this->statement->bindParam(3,$fuelAddedBy);
				 if ($this->statement->execute()) {
				 	return true;
				 }else{
				 	return false;
				 }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function tryToDeleteClientFromTheSystem($clientId){
			try {
				 $this->query  = "delete from clients where clientld	=?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$clientId);
				 if ($this->statement->execute()) {
				 	return true;
				 }else{
				 	return false;
				 }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function tryToApproveClientPayment($clientId){
			try {
				 $this->query  = "update clients set paymentStatus='payment_approved' where clientld =?";
				 $this->statement  = $this->conn->prepare($this->query);
				 $this->statement->bindParam(1,$clientId);
				 if ($this->statement->execute()) {
				 	return true;
				 }else{
				 	return false;
				 }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function tryToAccessFuelTank($supervisorName){
			try {
				  $this->query  = "select * from fuelatsp where fldoneBy=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$supervisorName);
				  $this->statement->execute();
			  $arrayOfFuels  = array();

			  while ($data  = $this->statement->fetchAll()) {
			  	$arrayOfFuels  = $data;
			  }
			  return $arrayOfFuels;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function didThePompisteMarkTheRemainigOIfToDayAttendance($fuelName,$date,$user){
			try {

				  $this->query  = "select * from remaaining where fuelName=? and date=? and  user=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fuelName);
				  $this->statement->bindParam(2,$date);
				  $this->statement->bindParam(3,$user);
				  $this->statement->execute();

				  return $this->statement->rowCount();
				  
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function markThePomisteThatSheOrHeMarkToDayRemanining($fuelName,$Quantity,$date,$totalAmount,$user){
			try {
				  $this->query  = "insert into remaaining set fuelName=?,Quantity=?,date=?,totalAmount=?,user=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fuelName);
				  $this->statement->bindParam(2,$Quantity);
				  $this->statement->bindParam(3,$date);
				  $this->statement->bindParam(4,$totalAmount);
				  $this->statement->bindParam(5,$user);
				  

				 if ($this->statement->execute()) {
				 	return true;
				 }else{
				 	return false;
				 }


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function tryToFetchToDaysDataBasedOnFuelsSoldedByUser($fuelName,$date,$user){
			try {
				  $this->query  = "select * from clients where fuelConsumed=? and date=? and  doneby=? and paymentStatus='payment_approved'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fuelName);
				  $this->statement->bindParam(2,$date);
				  $this->statement->bindParam(3,$user);
				  $this->statement->execute();

				  $arrayOfFuel  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		



		public function didYouToDaySellToDayThisFuel($fuelName,$date,$user){
			try {
				  $this->query  = "select * from clients where fuelConsumed=? and date=? and  doneby=? and paymentStatus='payment_approved'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fuelName);
				  $this->statement->bindParam(2,$date);
				  $this->statement->bindParam(3,$user);
				  $this->statement->execute();
				  return $this->statement->rowCount();


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectPremiumFuelLeftedInTheTankYestraday($yesrdayDate,$user){
			try {

				  $this->query  = "select * from remaaining where date=? and  user=?  and fuelName='Premium'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$yesrdayDate);
				  $this->statement->bindParam(2,$user);
				  $this->statement->execute();

				  $arrayOfFuel  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectDieselFuelLeftedInTheTankYestraday($yesrdayDate,$user){
			try {

				  $this->query  = "select * from remaaining where date=? and  user=?  and fuelName='Diesel'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$yesrdayDate);
				  $this->statement->bindParam(2,$user);
				  $this->statement->execute();

				  $arrayOfFuel  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function selectKeroseneFuelLeftedInTheTankYestraday($yesrdayDate,$user){
			try {

				  $this->query  = "select * from remaaining where date=? and  user=?  and fuelName='Kerosene'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$yesrdayDate);
				  $this->statement->bindParam(2,$user);
				  $this->statement->execute();

				  $arrayOfFuel  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function selectAllFuelRemarkedByOuAndOther($yesrdayDate){
			try {

				  $this->query  = "select * from remaaining where date=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$yesrdayDate);
				  $this->statement->execute();

				  $arrayOfFuel  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function sisThereAnyPompistedOnTable($supervisorName){
			try {
				  $this->query  = "select * from users where SupervisedBy=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$supervisorName);
				  $this->statement->execute();
				  return  $this->statement->rowCount();


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}



		public function sisThereAnyPompistedOnTableReallyData($supervisorName){
			try {
				  $this->query  = "select * from users where SupervisedBy=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$supervisorName);
				  $this->statement->execute();

				  $arraOfSuper  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	 $arraOfSuper  = $data;
				  }
				  return $arraOfSuper;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function tryToRegisterNewClientPompiste($pumpistFullName,$pumpistGender,$pumpistPhone,$pumpistUsername,$pumpistPassword,$pumpistBranch,$supervisorAccount){
			try {
				  $this->query  = "insert into users set userfullNames=?,userGender=?,userPhone=?,userName=?,userPassword=?,userAssignedBranch=?,SupervisedBy=?,userStatus='no_action',userRole='Pump Attendant'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$pumpistFullName);
				  $this->statement->bindParam(2,$pumpistGender);
				  $this->statement->bindParam(3,$pumpistPhone);
				  $this->statement->bindParam(4,$pumpistUsername);
				  $this->statement->bindParam(5,$pumpistPassword);
				  $this->statement->bindParam(6,$pumpistBranch);
				  $this->statement->bindParam(7,$supervisorAccount);

				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }



			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}	


		public function tryToRegisterNewSupervisor($superNames,$superGender,$superPhone,$superUsername,$superPassword,$superBranch,$superVisedAccount){
			try {
				  $this->query  = "insert into users set userfullNames=?,userGender=?,userPhone=?,userName=?,userPassword=?,userAssignedBranch=?,SupervisedBy=?,userStatus='no_action',userRole='Supervisor'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superNames);
				  $this->statement->bindParam(2,$superGender);
				  $this->statement->bindParam(3,$superPhone);
				  $this->statement->bindParam(4,$superUsername);
				  $this->statement->bindParam(5,$superPassword);
				  $this->statement->bindParam(6,$superBranch);
				  $this->statement->bindParam(7,$superVisedAccount);

				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function defaultSpStation($fuelName,$flUnitPrice,$flQuantity,$flRemaining,$superUsername){
			try {
				  $this->query  = "insert into fuelatsp set flName=?,flUnitPrice=?,flQuantity=?,flRemaining=?,flStatus='full_tanked',fldoneBy=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fuelName);
				  $this->statement->bindParam(2,$flUnitPrice);
				  $this->statement->bindParam(3,$flQuantity);
				  $this->statement->bindParam(4,$flRemaining);
				  $this->statement->bindParam(5,$superUsername);
				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function tryToModifyExistinSupervisor($superNames,$superGender,$superPhone,$superUsername,$superPassword,$superBranch,$superId){
			try {
				  $this->query  = "update  users set userfullNames=?,userGender=?,userPhone=?,userName=?,userPassword=?,userAssignedBranch=? where userId =?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superNames);
				  $this->statement->bindParam(2,$superGender);
				  $this->statement->bindParam(3,$superPhone);
				  $this->statement->bindParam(4,$superUsername);
				  $this->statement->bindParam(5,$superPassword);
				  $this->statement->bindParam(6,$superBranch);
				  $this->statement->bindParam(7,$superId);

				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		




		public function tryToModifyExistingPompiste($pumpistFullName,$pumpistGender,$pumpistPhone,$pumpistPassword,$pumpistUsername){
			try {
				  $this->query  = "update  users set userfullNames=?,userGender=?,userPhone=?,userPassword=? where userName=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$pumpistFullName);
				  $this->statement->bindParam(2,$pumpistGender);
				  $this->statement->bindParam(3,$pumpistPhone);
				  $this->statement->bindParam(4,$pumpistPassword);
				  $this->statement->bindParam(5,$pumpistUsername);
				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function deletePumpisteFromTheTable($pumpistUsername){
			try {
				  $this->query  = "delete from  users where userName=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$pumpistUsername);
				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }
				  $this->statement->execute();

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function selectFuelInTheTank($fuelInTankId){
			try {
				  $this->query  = "select * from fuelatsp where flId=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fuelInTankId);
				  $this->statement->execute();

				  $arrayOfFuels  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuels  = $data;
				  }
				  return $arrayOfFuels;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function setModifyExistingFuelInTheTank($onFuelId,$nowPrice,$nowFuel,$nowRem){
			try {

			  	  $this->query  = "update fuelatsp set flUnitPrice=?,flQuantity=?,flRemaining=? where flId=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$nowPrice);
				  $this->statement->bindParam(2,$nowFuel);
				  $this->statement->bindParam(3,$nowRem);
				  $this->statement->bindParam(4,$onFuelId);
				 
				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }


				 
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectToDaysRemarkedInformation($toDaysDate){
			try {

				  $this->query  = "select * from remaaining where date=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$toDaysDate);
				  $this->statement->execute();

				  $arrayOfFuel  = array();

				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;


			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectPumpisteCollector($superVisor){
			try {
				  $this->query  = "select distinct doneby  from clients where supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function selectFuelHistory($superVisor){
			try {
				  $this->query  = "select distinct fuelConsumed  from clients where supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectPaymentHistory($superVisor){
			try {
				  $this->query  = "select distinct paymentStatus  from clients where supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectFilteredDataByPompisteName($pompistUsername,$superVisor){
			try {
				  $this->query  = "select *  from clients where doneby=? and  supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$pompistUsername);
				  $this->statement->bindParam(2,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function selectFilteredDataBySelectedFuel($selectedFuel,$superVisor){
			try {
				  $this->query  = "select *  from clients where fuelConsumed=? and  supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$selectedFuel);
				  $this->statement->bindParam(2,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectFilteredDataByPaymentStatus($selectedByPayment,$superVisor){
			try {
				  $this->query  = "select *  from clients where paymentStatus=? and  supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$selectedByPayment);
				  $this->statement->bindParam(2,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectFilteredDataByDatePurchsed($purchasedOnDate,$superVisor){
			try {
				  $this->query  = "select *  from clients where date=? and  supervisorAccount=? ";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$purchasedOnDate);
				  $this->statement->bindParam(2,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function selectFilteredRangeOfDate($fromDateOn,$ToDateOn,$superVisor){
			try {
				  $this->query  = "select *  from clients where date between  ? and ? and  supervisorAccount=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$fromDateOn);
				  $this->statement->bindParam(2,$ToDateOn);
				  $this->statement->bindParam(3,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectAllClientFromMyPompiste($superVisor){
			try {
				  $this->query  = "select *  from clients where supervisorAccount=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superVisor);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function getAllInfoForManager($managerUsername){
			try {
				  $this->query  = "select *  from spmanager where ManagerUsername=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$managerUsername);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function gatherAllInformationRelatedToSupervisor(){
			try {
				  $this->query  = "select *  from users where userRole='Supervisor'";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		public function selectInfoRelatedToSingleSuperVisor($superId){
			try {
				  $this->query  = "select *  from users where userId=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superId);
				  $this->statement->execute();
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		



		public function deleteSuperFromSyteme($superId) {
			try {
				  $this->query  = "delete from users where userId=?";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->bindParam(1,$superId);
				 
				  if ($this->statement->execute()) {
				  	return true;
				  }else{
				  	return false;
				  }
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}		


		public function selectSupervisorToViewTheirRepport() {
			try {
				  $this->query  = "select distinct(supervisorAccount)  from clients";
				  $this->statement  = $this->conn->prepare($this->query);
				  $this->statement->execute();
				  
				  $arrayOfFuel  = array();
				  while ($data  = $this->statement->fetchAll()) {
				  	$arrayOfFuel  = $data;
				  }
				  return $arrayOfFuel;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}




	}
?>