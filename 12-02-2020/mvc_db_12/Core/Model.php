<?php

namespace Core;

use PDO;
use PDOException;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db == null) {
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $dbname = 'mvc';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>