<?php
	define('HOST', 		'localhost'); 
	define('USERNAME', 	'root'); 
	define('PASSWORD', 	''); 
	define('DATABASE', 	'company'); 

	class Connection
	{
		private static $instance;
		private $mysqli;
		
		private function __construct() {
			$this->mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
		}
		
		public static function getInstance() {
			if (self::$instance == null) {
				self::$instance = new Connection();
			}
			return self::$instance;
		}
		
		public function getConnection() {
			return $this->mysqli;
		}
	} 
	
	$mysqli = Connection::getInstance()->getConnection(); // to do...
	
	// alternative (deprecated)
	$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($connection, "utf8");
?>