<?php
include "C:/xampp/htdocs/dashboard/php-web/dao/Globals.php";
include 'C:/xampp/htdocs/dashboard/php-web/catalog/dao/DaoCatalog.php';

/**
 * @todo реализовать две функции
 * 1 функция выводит все страницы в количестве 10 шт +
 * 2 поиск страниц по ключевому полю +
 */


class CatalogDao implements DaoCatalog
{

    public function connectPDO()
    {
        try {
            $connect = Globals::getPDOConnection('phpdb');
        } catch (Exception $e) {
            echo $e;
        }
        return $connect;
    }

    public function save($image, $title, $price, $date)
    {
        $connect = $this->connectPDO();
        $query = "INSERT INTO phpdb.catalog (image, title, price, date) Values (:image, :title, :price, :dates)";
        try {
            $res = $connect->prepare($query);
            $res->bindValue(':image', $image);
            $res->bindValue(':title', $title);
            $res->bindValue(':price', $price);
            $res->bindValue(':dates', $date);
            $res->execute();
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }

    public function getAll()
    {
        $connect = $this->connectPDO();
        try {
            $query = "SELECT * FROM phpdb.catalog ORDER BY date DESC";
            $res = $connect->prepare($query);
            $res->execute();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            $list = $res;
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
        return $list;
    }


    public function delete($id_delete)
    {
        $id = $id_delete;
        $connect = $this->connectPDO();
        $query = "DELETE FROM phpdb.catalog WHERE id= :id;";
        try {
            $res = $connect->prepare($query);
            $res->bindValue(":id", $id);
            $res->execute();
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }

    public function getId($id)
    {
        $connect = $this->connectPDO();
        try {
            $query = "SELECT * FROM phpdb.catalog WHERE id= :id;";
            $res = $connect->prepare($query);
            $res->bindValue(":id", $id);
            $res->execute();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            $list = $res;
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
        return $list;
    }

    public function update($id, $image, $title, $price, $date)
    {
        $connect = $this->connectPDO();
        $query = "UPDATE phpdb.catalog SET image = :image, title = :title, price = :price, date = :dates WHERE id=:id";
        try {
            $res = $connect->prepare($query);
            $res->bindValue(':image', $image);
            $res->bindValue(':title', $title);
            $res->bindValue(':price', $price);
            $res->bindValue(':dates', $date);
            $res->bindValue(':id', $id);
            $res->execute();
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
    }


    public function link1($start_from, $limit)
    {
        $connect = $this->connectPDO();
        try {
            $query = "SELECT * FROM phpdb.catalog WHERE id>0  ORDER BY date DESC LIMIT $start_from, $limit ";
            $result = $connect->prepare($query);
            $result->execute();
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
        return $result;
    }

    public function link2()
    {
        $connect = $this->connectPDO();
        try {
            $query = "SELECT COUNT(id) FROM phpdb.catalog";
            $res = $connect->prepare($query);
            $res->execute();
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }

        return $res;
    }


    public function find($search)
    {
        $connect = $this->connectPDO();
        try {
            $query = "SELECT * FROM phpdb.catalog Where title like '%$search%'  ";
            $result = $connect->prepare($query);
            $result->execute();
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<br> Исключение: " . __FILE__ . " " . __LINE__ . " " . $e->getMessage() . "<br>";
        }
        return $result;
    }


}