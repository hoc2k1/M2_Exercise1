<?php 
namespace Model\Device;

class Device {
    protected $name;
    protected $macAddress;
    protected $ip;
    protected $date;
    protected $consumption;

    public function __construct($name, $macAddress, $ip, $date, $consumption) {
        $this->name = $name;
        $this->macAddress = $macAddress;
        $this->ip = $ip;
        $this->date = $date;
        $this->consumption = $consumption;
    }

    public function getName() {
        return $this->name;
    }
    public function getMacAddress() {
        return $this->macAddress;
    }
    public function getIp() {
        return $this->ip;
    }
    public function getDate() {
        return $this->date;
    }
    public function getConsumption() {
        return $this->consumption;
    }
}
?>