<?php

require_once ROOT_APP . "core/Helper.php";

class Database {
    private $connection;
    function __construct() {
        $this->connect();
    }

    function connect() {
        try {
            $this->connection = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASS"], $_ENV["DB_NAME"]);
        } catch (Exception $e) {
            $helper = new Helper;
            $helper->showError(
                [
                    "mysqli error" => $e->getMessage(),
                    "error" => "Koneksi ke database gagal <b> PASTIKAN .env sudah di setting dengan benar </b>",
                ]
            );
        }
    }
}