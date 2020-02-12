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
                echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
