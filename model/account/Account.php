<?php 
namespace Model\Account;

class Account {
    protected $usename;
    protected $password;

    public function __construct($usename, $password) {
        $this->usename = $usename;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->usename;
    }
    public function getPassword() {
        return $this->password;
    }
}
?>