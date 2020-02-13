<?php

namespace App\Models;

use PDO;
use PDOException;

class Insert extends \Core\Model
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
                echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');document.location='/mvc_program/mvc_view_11/public/posts/index'</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not inserted successfully .');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateData($prepareData, $condition)
    {
        $name = $prepareData['name'];
        $mobile = $prepareData['mobile'];

        try {
            $db = static::getDB();
            $stmt = $db->query("UPDATE user_data SET name='$name', mobile='$mobile' WHERE id='$condition'");
            if ($stmt) {
                echo "<script type= 'text/javascript'>alert('Data Updated Successfully'); document.location='/mvc_program/mvc_view_11/public/posts/index'</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not Updated successfully.');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteData($condition)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("DELETE FROM user_data WHERE id='$condition'");
            if ($stmt) {
                echo "<script type= 'text/javascript'>alert('Data Deleted Successfully'); document.location='/mvc_program/mvc_view_11/public/posts/index'</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not Deleted successfully.');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>