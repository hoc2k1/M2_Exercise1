<?php 
namespace LogController;

use Model\Database\DBConnect;
use Model\Log\LogDB;

class LogController {
    protected $deviceDB;
    public function __construct() {
        $db = new DBConnect();
        $this->deviceDB = new LogDB($db->connect());
    }
    public function getListLogs() {
        return $this->deviceDB->getListLogs();
    }

    public function getCount() {
        return $this->deviceDB->getCount( );
    }
}

?>