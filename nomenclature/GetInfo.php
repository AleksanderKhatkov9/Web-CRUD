<?php

class GetInfo
{
    public $connect;

    public function __construct()
    {
        include_once("D:/home/atlant/config/Globals.php");
        try {
            $this->connect = Globals::getPDOConnection('portal');
        } catch (Exception $e) {
            echo 'Поймано исключение: ', $e->getMessage(), "\n";
        }
    }

    public function info()
    {
        $get_cookie_uid = $_COOKIE['ldapUID'];
        $task = '16819';
        $stmt = $this->connect->query("SELECT tn,fio FROM a_auth_ldap WHERE uid = '$get_cookie_uid'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

//            echo "<pre>";
//            print_r($row);
//            echo "</pre>";
        $tn = $row['tn'];
        $result = $this->search_tn($tn, $task);
//            echo "<pre>";
//            print_r($result);
//            echo "</pre>";
        $task = $result['task'];
        $role = $result['role'];

        return $result;
    }

    public function search_tn($tn, $task) // функция для авторизации пользователя
    {
        $stmt = $this->connect->query("SELECT t1.task,t1.role,t1.dept,t1.page, t2.fio, t1.tn 
                FROM a_permissions t1 
                JOIN a_staff t2 ON t1.tn = t2.tn
                WHERE t1.task = '$task' AND t1.tn = '$tn'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

