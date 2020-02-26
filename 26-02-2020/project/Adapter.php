<?php

class Adapter
{
    protected $config = [
        'host' => 'localhost',
        'db' => 'project',
        'user' => 'root',
        'password' => ''
    ];

    protected $connect;
    protected $query;
    public function setConfig($config)
    {
        if (!is_array($config)) {
            throw new Exception("config should be array.");
        }
        $this->config = array_merge($this->config, $config);
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConnect($connect)
    {
        $this->connect = $connect;
        return $this;
    }

    public function getConnect()
    {
        return $this->connect;
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function connect()
    {
        $connect = new mysqli($this->config['host'], $this->config['user'], $this->config['password'], $this->config['db']);
        $this->connect = $connect;
    }

    public function isConnected()
    {
        if (!$this->getConnect()) {
            return false;
        }
        return true;
    }
    
    public function query($query)
    {
        if (!$this->isConnected()) {
            $this->connect();
        }
        $this->setQuery($query);
        return $this->getConnect()->query($this->getQuery());
    }
}
?>