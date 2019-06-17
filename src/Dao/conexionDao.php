<?php 

	require_once __DIR__.'/../../config.php';

	class DB{
	    
	    private $hostname = HOST_NAME;
	    private $database = DATABASE_NAME;
	    private $user = USER;
	    private $password = PASSWORD;
	    private $charset = CHARSET;
	    private $db;

	    public function read ()
		{
			try {

				$opcions = array(
	                        PDO::ATTR_PERSISTENT=>true,
	                        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION                
	                        );

				$this->db = new PDO('mysql:host='.$this->hostname.';dbname='.$this->database, 
	                                    $this->user, $this->password, $opcions);

				$rows = $this->db->query("SELECT * FROM payments ORDER BY date DESC")->fetchAll(PDO::FETCH_OBJ);
				return $rows;
			}
			catch(PDOException $e){

				echo "¡ERROR: !".$e->getMessage();
			
			}
		}
 
 
 
		public function write($session,$date,$status)
		{

			try {

				$opcions = array(
	                        PDO::ATTR_PERSISTENT=>true,
	                        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION                
	                        );

				$this->db = new PDO('mysql:host='.$this->hostname.';dbname='.$this->database, 
	                                    $this->user, $this->password, $opcions);
				
				$num = $this->db->query("INSERT INTO payments VALUES ($session,'$date','$status')");
				return $num;
			}
			catch(PDOException $e){
				echo "¡ERROR: !".$e->getMessage();
			}

		}
	}
 ?>
