<?php

/**@todo переписать файл с sql на pdo */


global $result_param;
include "C:/xampp/htdocs/dashboard/php-web/dao/Globals.php";
class DaoUser
{
    public function connectPDO()
    {
        try {
            $conn = Globals::getPDOConnection('phpdb');
        } catch (Exception $e) {
            echo $e;
        }
        return $conn;
    }

    function save(User $user)
    {
        $name = $user->getName();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $conn = $this->connectPDO();
        $query = "INSERT INTO phpdb.user (name, password, email) Values (:name, :password,:email)";
        try {
            $res = $conn->prepare($query);
            $res->bindValue(':name',$name);
            $res->bindValue(':password',$password);
            $res->bindValue(':email', $email);
            $res->execute();
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }

    }

    public function getAll()
    {
        $conn = $this->connectPDO();
        $query = "SELECT * FROM phpdb.user";
        try {
            $res = $conn->prepare($query);
            $res->execute();
            $num = $res->rowCount();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            $list = $res;
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
        return $list;
    }

    public function delete($id)
    {
        $conn = $this->connectPDO();
        $query = "DELETE FROM phpdb.user WHERE id= :id;";
        try {
            $res = $conn->prepare($query);
            $res->bindValue(":id", $id);
            $res->execute();
            $num = $res->rowCount();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }


    public function getId($id)
    {
        try {
            $conn = $this->connectPDO();
            $query = "SELECT * FROM phpdb.user WHERE id= :id;";
            $res = $conn->prepare($query);
            $res->bindValue(":id", $id);
            $res->execute();
            $num = $res->rowCount();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            $list = $res;
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }

        return $list;
    }


    public function update($id, $name, $password, $email)
    {

        $conn = $this->connectPDO();
        $query = "UPDATE phpdb.user SET name = :name, password = :password, email = :email WHERE id=:id";
        try {
            $res = $conn->prepare($query);
            $res->bindValue(":id", $id);
            $res->bindValue(":name", $name);
            $res->bindValue(":password", $password);
            $res->bindValue(":email", $email);
            $res->execute();
            $num = $res->rowCount();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }
}