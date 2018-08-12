<?php
/**
 * Created by PhpStorm.
 * User: hedgehog
 * Date: 11.08.2018
 * Time: 6:37
 */

class DatabaseHelper
{
    private $db;

    private $error = null;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->db = new PDO("mysql:host=" . $host .
                ";dbname=" . $dbname, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage();
        }
    }

    public function select($sql, $arrayPraceHolders)
    {
        $stmt = $this->db->prepare($sql);

        $stmt->execute($arrayPraceHolders);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }


    public function insert($sql, $arrayPraceHolders)
    {
        $stmt = $this->db->prepare($sql);

        $stmt->execute($arrayPraceHolders);
    }
    public function getLastError()
    {
        return $this->error;
    }

    public function getLastId()
    {
        return $this->db->lastInsertId();
    }
}