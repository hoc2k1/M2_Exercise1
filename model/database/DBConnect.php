<?php 
namespace Model\Database;

use PDO;
use PDOException;

class DBConnect {
    protected $dns;
    protected $usename;
    protected $password;

    public function __construct(){
        $this->dns = 'mysql:host=localhost;dbname=ex1';
        $this->usename = 'M2_ex1';
        $this->password = 'hockt';
    }

    public function connect(){
        try{
            return new PDO($this->dns,$this->usename,$this->password);
        }
        catch (PDOException $e){
            return ("Connection failed: " . $e->getMessage());
        }
    }

}
?>