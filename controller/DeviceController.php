<?php 
namespace DeviceController;

use Model\Device\DeviceDB;
use Model\Database\DBConnect;
use Model\Device\Device;

class DeviceController {
    protected $deviceDB;
    public function __construct() {
        $db = new DBConnect();
        $this->deviceDB = new DeviceDB($db->connect());
    }
    
    // Ham de tat ca devices va tra ve array doi tuong Device
    public function getAllDevices() {
        return $this->deviceDB->getAllDevices();
    }

    // Ham them mot device moi
    public function addNewDevice() {
        if ($_SERVER["REQUEST_METHOD"] && $_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["device"];
            $macAddress = "00:1B:44:11:3A:B8";
            $ip = $_POST["ip"];
            $date = date("Y-m-d");
            $consumption = 20;
            unset($_SERVER["REQUEST_METHOD"]);
            $_SERVER = array();
            $newDevice= new Device($name, $macAddress, $ip, $date, $consumption);
            return $this->deviceDB->addNewDevice($newDevice);
        }
    }
}

?>