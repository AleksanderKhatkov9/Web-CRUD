<?php

/**@todo переписать файл с sql на pdo + */

include "C:/xampp/htdocs/dashboard/php-web/dao/Globals.php";

class DaoUser
{

    function connect()
    {
        try {
            $connect = Globals::getPDOConnection('phpdb');
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
        return $connect;

    }

    function save(User $binUser)
    {
        $name = $binUser->getName();
        $password = $binUser->getPassword();
        $email = $binUser->getEmail();

        $dao = new DaoUser();
        $conn = $dao->connect();

        $query = "INSERT INTO phpdb.user (name, password, email) Values (:name, :password, :email)";
        try {
            $res = $conn->prepare($query);
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

    public function getAll()
    {
        $conn = Globals::getPDOConnection('phpdb');
        try {
            $query = "SELECT * FROM phpdb.user";
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

    public function delete($id_del)
    {
        $id = $id_del;

        $dao = new DaoUser();
        $conn = $dao->connect();

        $query = "DELETE FROM phpdb.user WHERE id= :id;";
        try {
            $res = $conn->prepare($query);
            $res->bindValue(":id", $id);
            $res->execute();
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }


    public function getId($getId)
    {
        $id = $getId;
        $dao = new DaoUser();
        $conn = $dao->connect();

        $query = "SELECT * FROM phpdb.user WHERE id= :id;";
        try {
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


    public function update($id_edit, $name_edit, $password_edit, $email_edit)
    {
        $id = $id_edit;
        $name = $name_edit;
        $password = $password_edit;
        $email = $email_edit;
        $dao = new DaoUser();
        $conn = $dao->connect();

        $query = "UPDATE phpdb.user SET name = :name, password = :password, email = :email WHERE id=:id";
        try {
            $res = $conn->prepare($query);
            $res->bindValue(":id", $id);
            $res->bindValue(":name", $name);
            $res->bindValue(":password", $password);
            $res->bindValue(":email", $email);
            $res->execute();
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }

}