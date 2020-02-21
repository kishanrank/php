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

    public static function getRow($table, $email, $password)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM $table where email='$email' AND password='$password'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getCurrentId($table, $email, $password)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT user_id FROM $table where email='$email' AND password='$password'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
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

    public static function getSlotCount($table, $date, $slot)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT COUNT(slot) as slot FROM $table where date='$date' and slot='$slot'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public static function getLicenceData($table, $column)
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

}