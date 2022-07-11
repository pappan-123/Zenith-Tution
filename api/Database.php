<?php


require_once __DIR__.'/constants/HTTPStatus.php';

class Database
{

    // specify your own database credentials
    private $servername = "localhost";
   
    private $username = "u797100727_zenithtuition";
    
    private $password = "B1i?!^6^g=#wl^U6V]sUnx9X43";
    
    private $dbname = "u797100727_Zenith_Tuition";
    
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);

            $this->conn->exec("set time_zone = '+05:30';");

        }catch(PDOException $exception){

            throw new Exception("unable to connect to database", HTTPStatus::INTERNAL_SERVER_ERROR);
        }
 
        return $this->conn;
    }

    public function ping() {
        try {            
            $this->conn->query('SELECT 1');
        } catch (PDOException $e) {
            $this->getConnection();         // Don't catch exception here, so that re-connect fail will throw exception
        }

        return $this->conn;
    }

}

?>
