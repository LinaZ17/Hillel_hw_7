<?php

namespace app\Classes;

use Aigletter\Interfaces\Builder\QueryInterface;
use \PDO;


class DB
{
    protected $db;

    // Соединение с БД
    public function __construct()
    {
        try {
            $db = $this->db = new \PDO('mysql:host=localhost;dbname=users', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $exception) {
            die('Cant connect: ' . $exception->getMessage());
        }

    }

    public function one(QueryInterface $query)
    {
        $q = $this->db->query($query->toSql());
        return $q->fetch(PDO::FETCH_OBJ);
    }

    public function all(QueryInterface $query)
    {
        $q = $this->db->query($query->toSql());
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}























