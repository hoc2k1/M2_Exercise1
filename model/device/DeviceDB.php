<?php 
namespace Model\Device;
use Model\Device\Device;

use PDOException;

class DeviceDB {
    protected $connect;
    public function __construct(\PDO $connect) {
        $this->connect = $connect;
    }
    public function getAllDevices() {
        $sql = "Select * from devices";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->createDevicesfromDB($result);
    }

    public function createDevicesfromDB($result) {
        $devicesArray = [];
        foreach ($result as $device) {
            $deviceItem = new Device($device['name'], $device['mac_address'], $device['ip'], $device['create_date'], $device['power_consumption']);
            array_push($devicesArray, $deviceItem);
        }
        return $devicesArray;
    }
    public function addNewDevice($device) {
        $name = $device->getName();
        $macAddress = $device->getMacAddress();
        $ip = $device->getIp();
        $date = $device->getDate();
        $consumption = $device->getConsumption();
        $sql = "Insert into devices(name, mac_address, ip, create_date, power_consumption) values ('$name', '$macAddress', '$ip', '$date', $consumption)";
        $stmt = $this->connect->prepare($sql);
        try {
            $result = $stmt->execute();
            if($result) {
                header("Location: http://localhost:3000/view/Dashboard.php");
            }
            return $result;
        }
        catch (PDOException $e) {
            $result = strstr($e->getMessage(), "Duplicate");
            if($result) {
                echo '<script>alert("Device already exists!")</script>';
            }
            else {
                echo $e->getMessage();
            }
        }
        
    }
}   

?>