<?php 
namespace Model\AccountDB;
use Model\Account\Account;

class AccountDB {
    protected $connect;
    public function __construct(\PDO $connect) {
        $this->connect = $connect;
    }
    public function getAllAccount() {
        $sql = "Select * from users";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->createAccountfromDB($result);
    }

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