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

    // Lay ten thiet bi
    public function getName() {
        return $this->name;
    }

    // Lay dia chi MAC thiet bi
    public function getMacAddress() {
        return $this->macAddress;
    }

    // Lay IP thiet bi
    public function getIp() {
        return $this->ip;
    }

    // Lay ngay tao thiet bi
    public function getDate() {
        return $this->date;
    }

    // Lay luong dien tieu thu
    public function getConsumption() {
        return $this->consumption;
    }
}
?>