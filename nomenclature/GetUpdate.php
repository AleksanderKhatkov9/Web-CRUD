<?php

class GetUpdate
{

    public $connect;

    public function __construct()
    {
        include_once("D:\home\atlant\config\Globals.php");
        try {
            $this->connect = Globals::getPDOConnection('glossary');
        } catch (Exception $e) {
            echo 'Поймано исключение: ', $e->getMessage(), "\n";
        }
    }


    public function getUpdate()
    {
        if (isset($_POST["get_id"])) {
            $id = $_POST["get_id"];
            $stmt = $this->connect->query("SELECT * FROM nomenclature WHERE id = '$id' ");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } // if(POST)
        return json_encode($row);
    }
}

$obj = new GetUpdate();
if (isset($_POST['method']) && $_POST['method'] == 'getUpdate') {
    echo $obj->getUpdate();
}