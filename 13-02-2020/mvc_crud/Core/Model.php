<?php

namespace Core;

use PDO;
use PDOException;
use \App\Config;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db == null) {
            // $host = 'localhost';
            // $user = 'root';
            // $password = '';
            // $dbname = 'mvc';

            try {
                //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>