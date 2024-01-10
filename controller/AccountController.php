<?php 
namespace AccountController;

use Model\Account\AccountDB;
use Model\Database\DBConnect;

class AccountController {
    protected $accountDB;
    public function __construct() {
        $db = new DBConnect();
        $this->accountDB = new AccountDB($db->connect());
    }

    // Ham de tat ca account va tra ve array doi tuong Account
    public function getAllAccount() {
        return $this->accountDB->getAllAccount();
    }

    // Ham validate thong tin khi login
    public function validateAccount() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $allAccount = $this->getAllAccount();
            $checkLogin = false;
            foreach ($allAccount as $key => $account) {
                if ($account->getUsername() == $username && $account->getPassword() == $password) {
                    $checkLogin = true;
                    break;
                }
            }
            return $checkLogin;
        }
    }
}

?>