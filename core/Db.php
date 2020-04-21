<?php


class Db
{

    public $db;
    private $dns = 'mysql:host=127.0.0.1;dbname=mysql';
    private $user = 'ilya';
    private $pass = 'pass123';
    private $dbName = 'yclients';

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dns, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "USE " . $this->dbName;
            $this->db->exec($sql);
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }
}