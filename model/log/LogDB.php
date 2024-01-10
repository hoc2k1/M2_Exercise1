<?php 
namespace Model\Log;
use Model\Log\Log;

class LogDB {
    protected $connect;
    public function __construct(\PDO $connect) {
        $this->connect = $connect;
    }

    // Tao doi tuong Log
    public function createLogsfromDB($result) {
        $logsArray = [];
        foreach ($result as $log) {
            $logItem = new Log($log['ID'], $log['name'], $log['action'], $log['date']);
            array_push($logsArray, $logItem);
        }
        return $logsArray;
    }

    // Lay danh sach logs tu DB voi cac tham so truyen vao: Keyword, limit, offset
    public function getListLogs() {
        $keyword = isset($_GET['name']) ? $_GET['name'] : '';
        global $limit;
        $limit = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = $page > 0 ? $page : 1;
        $offset = ($page -1) * $limit;

        $sql = "Select * from logs where name like '%$keyword%' limit $limit offset $offset";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->createLogsfromDB($result);
    }

    // Lay so luong logs tu DB voi tham so truyen vao: Keyword (Mac dinh la so luong logs cua bang)
    public function getCount() {
        $keyword = isset($_GET['name']) ? $_GET['name'] : '';

        $sql = "Select count(*) from logs where name like '%$keyword%'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result[0]["count(*)"];
    }
}   

?>