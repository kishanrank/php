<?php

namespace App\Models;

use PDO;
use PDOException;

class DataOperation extends \Core\Model
{
    public static function addData($table, $prepareData)
    {
        $tableField = array_keys($prepareData);
        $field = implode(',', $tableField);

        $tableValue = array_values($prepareData);
        $value = "'" . implode("','", $tableValue) . "'";
        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO $table ($field) VALUES ($value)");
            if ($stmt) {
                return $db->lastInsertId();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateData($table, $prepareData, $condition)
    {

        try {
            $db = static::getDB();
            foreach ($prepareData as $key => $value) {
                $stmt = $db->query("UPDATE $table SET $key = '$value' WHERE $condition");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteData($table, $condition)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("DELETE FROM $table WHERE $condition");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteTable($table)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("DELETE FROM $table");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAll($table)
    {

        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM $table");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function getRow($name, $password)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM user_data where name='$name' AND password='$password'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getById($table, $id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM $table where $id");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllById($table, $id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM $table where $id");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getColumn($column, $table, $condition)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT $column FROM $table where $condition");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getFullColumn($column, $table)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT $column FROM $table");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getJoinProduct($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT P.* FROM products P INNER JOIN products_categories PC ON
            P.product_id = PC.product_id INNER JOIN categories C ON C.category_id = PC.category_id WHERE C.category_id = '$id'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
