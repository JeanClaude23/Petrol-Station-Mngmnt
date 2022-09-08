<?php
	class connection{

		public function connectingToServer(){
			$this ->conn = new PDO("mysql:host=127.0.0.1;dbname=spfuel","root","");

			if ($this->conn) {
				return $this->conn;
			}else{
				echo "Not Connected";
			}
		}
	}
?>