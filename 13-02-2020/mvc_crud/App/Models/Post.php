<?php

namespace App\Models;

use PDO;
use PDOException;

class Post extends \Core\Model
{
    public static function getAll()
    {
        // $host = 'localhost';
        // $user = 'root';
        // $password = '';
        // $db = 'mvc';

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM user_data");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getRow($condition)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM user_data where id='$condition'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>