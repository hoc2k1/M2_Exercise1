<?php 
namespace Model\Account;

class Account {
    protected $usename;
    protected $password;

    public function __construct($usename, $password) {
        $this->usename = $usename;
        $this->password = $password;
    }

    // Lay username tai khoan
    public function getUsername() {
        return $this->usename;
    }
    
    // lay password tai khoan
    public function getPassword() {
        return $this->password;
    }
}
?>