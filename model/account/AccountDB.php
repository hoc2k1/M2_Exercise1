<?php 
namespace Model\Account;
use Model\Account\Account;

class AccountDB {
    protected $connect;
    public function __construct(\PDO $connect) {
        $this->connect = $connect;
    }

    // Lay toan bo tai khoan tu db
    public function getAllAccount() {
        $sql = "Select * from users";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->createAccountfromDB($result);
    }

    // Tao doi tuong Account
    public function createAccountfromDB($result) {
        $accoutArray = [];
        foreach ($result as $account) {
            $account = new Account($account['username'], $account['password']);
            array_push($accoutArray, $account);
        }
        return $accoutArray;
    }
}   

?>