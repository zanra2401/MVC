<?php

require_once ROOT_APP . "core/Helper.php";

class Database {
    private $pdo;
    private $stmt;

    function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"] . ";charset=utf8mb4",
                $_ENV["DB_USER"],
                $_ENV["DB_PASS"]
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $helper = new Helper;
            $helper->showError(
                [
                    "mysqli error" => $e->getMessage(),
                    "error" => "Koneksi ke database gagal <b> PASTIKAN .env sudah di setting dengan benar </b>",
                ]
            );
            die();  
        }
    }

    function sanitize(array $params)
    {
        
        foreach ($params as $key => $param)
        {
            $params[$key] = trim($params[$key]);
            $params[$key] = htmlspecialchars($params[$key], ENT_QUOTES, "UTF-8");
        }

        return $params;
    }

    function query($query)
    {
        $this->stmt = $this->pdo->prepare($query);
    }

    function bind($param, $value)
    {
        $this->stmt->bindParam($param, $value);
    }

    function fetchAll()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function set()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC); 
    }
}