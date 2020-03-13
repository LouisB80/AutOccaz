<?php

class DataBase {

    protected $db;

    private const USER = 'adminAutoccaz';
    private const PWD = 'admin123';
    private const HOST = 'localhost';
    private const DB = 'Autocazz';

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB . ';host=' . self::HOST;
        try {
            $this->db = new PDO($dsn, self::USER, self::PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $this->db;
        } catch (Exception $ex) {
            die('La connexion à la bd a échoué: ' . $ex->getMessage());
        }
    }

}
