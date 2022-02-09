<?php


class Globals
{
    static $connection_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET SQL_MODE = STRICT_TRANS_TABLES",
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAME utf8",

    ];

    /**
     * @var array Имя_соединения, адрес, логин, пароль
     */

    static $pdo_connection_data = [

        ['phpdb',
            'root',
            'sa@12345#',
            '127.0.0.1']
    ];


    /**
     * Возвращает полное имя хоста с протоколом подключения
     * @return string
     */


    static function getPDOConnection($name)
    {
        foreach (self::$pdo_connection_data as &$str)
            if ($str[0] == $name)
                $dsn = $str[0];
                $username = $str[1];
                $password = $str[2];
                $host = $str[3];

                return new PDO('mysql:host=localhost;dbname=phpdb', $username, $password);
    }

    /**
     * Проверка всех соединений
     */

    static function checkAllConnections()
    {
        foreach (self::$pdo_connection_data as &$str) {
            try {
                echo "Checking $str[0]...\n";
                self::getPDOConnection($str[0]);
            } catch (PDOException $e) {
                echo(' ' . $e->getMessage());
                echo("    \n");
            }
        }
    }


}