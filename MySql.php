<?php
	

	class MySql
	{
		private $pdo;
		
		public static function connect(){
			if(!isset($pdo)){
				$pdo = new PDO('mysql:host=localhost:4306;dbname=reserva','root','');
			}

			return $pdo;
		}
	}
?>