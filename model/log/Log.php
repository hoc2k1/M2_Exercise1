<?php 
namespace Model\Log;

class Log {
    protected $id;
    protected $name;
    protected $action;
    protected $date;

    public function __construct($id, $name, $action, $date) {
        $this->id = $id;
        $this->name = $name;
        $this->action = $action;
        $this->date = $date;
    }

    // Lay id thiet bi
    public function getId() {
        return $this->id;
    }

    // Lay ten thiet bi
    public function getName() {
        return $this->name;
    }

    // Lay trang thai thiet bi
    public function getAction() {
        return $this->action;
    }

    //lay ngay su dung thiet bi
    public function getDate() {
        return $this->date;
    }
}
?>