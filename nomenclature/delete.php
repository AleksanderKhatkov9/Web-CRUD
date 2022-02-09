<?php
include_once("D:\home\atlant\config\Globals.php");
try {
    $connect = Globals::getPDOConnection('glossary');
    if (isset($_POST["user_id"])) {
        $id = $_POST["user_id"];
        $sql = "DELETE FROM nomenclature WHERE id = :id";
        $statement = $connect->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
} catch (Exception $e) {
    echo 'Поймано исключение: ', $e->getMessage(), "\n";
    echo __FILE__ . " " . __LINE__ . " " . $e;
}