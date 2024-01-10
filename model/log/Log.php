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

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getAction() {
        return $this->action;
    }
    public function getDate() {
        return $this->date;
    }
}
?>