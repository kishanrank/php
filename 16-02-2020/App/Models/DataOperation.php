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
                echo "<script type= 'text/javascript'>alert('Data Inserted Successfully'); document.location='/mvc_program/mvc_view_11/public/Product/manageProduct'</script>";
                return $db->lastInsertId();
            } else {
                echo "<script type= 'text/javascript'>alert('Data not inserted successfully .');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateData($table, $prepareData, $condition)
    {

        try {
            $db = static::getDB();
            foreach($prepareData as $key => $value) {
            $stmt = $db->query("UPDATE $table SET $key = '$value' WHERE $condition");
            }
            if ($stmt) {
                echo "<script type= 'text/javascript'>alert('Data Updated Successfully'); document.location='/mvc_program/mvc_view_11/public/Product/manageProduct'</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not Updated successfully.');</script>";
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
            if ($stmt) {
                echo "<script type= 'text/javascript'>alert('Data Deleted Successfully'); document.location='/mvc_program/mvc_view_11/public/Product/manageProduct'</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not Deleted successfully.');</script>";
            }
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
}
?>