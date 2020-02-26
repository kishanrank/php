<?php

require "Adapter.php";
class Row
{
    protected $tableName;
    protected $primaryKey;
    protected $data;
    protected $rowChanged;
    protected $adapter;

    public function __construct()
    {
        $this->setAdapter();
        $this->getAdapter()->connect();
    }

    public function setAdapter($adapter = null)
    {
        if ($this->adapter == null) {
            $this->adapter = new Adapter();
            return $this;
        }
        $this->adapter = $adapter;
        return $this;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setRowChanged($rowChanged)
    {
        $this->rowChanged = $rowChanged;
        return $this;
    }

    public function getRowChanged()
    {
        return $this->rowChanged;
    }

    public function __set($name, $value)
    {
        $this->setRowChanged(true);
        $this->data[$name] = $value;
        return $this;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function unset($id)
    {
        unset($this->data[$id]);
    }

    public function insert()
    {
        $userData = $this->data;
        foreach ($userData as $key => $value) {
            $userData[$key] = $this->getAdapter()->getConnect()->real_escape_string($value);
        }
        $tableField = array_keys($userData);
        $field = implode(',', $tableField);
        $tableValue = array_values($userData);
        $value = "'" . implode("','", $tableValue) . "'";
        $insertQuery = "INSERT INTO `{$this->getTableName()}` ($field) VALUES ($value)";
        $this->getAdapter()->query($insertQuery);
        $lastId = $this->getAdapter()->getConnect()->insert_id;
        if ($lastId) {
            $this->setRowChanged(true);
        }
        return $lastId;
    }

    public function update($id)
    {
        $primaryKey = $this->getPrimaryKey();
        $this->unset($primaryKey);
        $userData = $this->data;
        foreach ($userData as $key => $value) {
            $userData[$key] = $this->getAdapter()->getConnect()->real_escape_string($value);
        }
        foreach ($userData as $key => $value) {
        $userData[$key] = $key . "=" . "'$value'";
        }
        $updatedData = implode(',', $userData);
        $updateQuery = "UPDATE `{$this->getTableName()}` SET $updatedData WHERE $primaryKey = '$id'";
        $this->getAdapter()->query($updateQuery);
        $result = $this->getAdapter()->getConnect()->affected_rows;
        if ($result) {
            $this->setRowChanged(false);
        }
        echo "Affected Rows : " . $result . "<br>";
        echo $updateQuery;
    }

    public function fetchRow($query)
    {
        $row = $this->getAdapter()->query($query)->fetch_assoc();
        $this->data = $row;
        $this->setRowChanged(false);
        return $this;
    }

    public function fetchAll()
    {
        $query = "SELECT * FROM `{$this->getTableName()}`";
        $rows = $this->getAdapter()->query($query)->fetch_all(MYSQLI_ASSOC);
        if ($rows) {
            foreach ($rows as $key => $row) {
                $rows[$key] = (new Row())->setData($row);
            }
            return $rows;
        }
        return null;
    }

    public function load($id)
    {
        $id = (int) $id;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '$id'";
        return $this->fetchRow($query);
    }
}

$row = new Row();
$row->setTableName('product');
$row->setPrimaryKey('id');
echo "<pre>";
print_r($row);
$row->name = "Apple's";
$row->price = "100";
// $insert = $row->insert();
// print_r($insert);
$update = $row->update(40);
print_r($update);
print_r($row);
// $loads = $row->load(57);
// print_r($loads);
// $rows = $row->fetchAll();
// print_r($rows);
