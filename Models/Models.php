<?php

require_once 'Config/DataBase.php';

/**
 * Description of Model
 * @author lb
 */
class Models extends DataBase {

    /**
     * @var type int
     */
    private $id;

    /**
     * @var type string
     */
    private $model;

    /**
     * @var type int
     */
    private $FK_idBrands;

    public function __construct($model = '', $id_Brands = '') {
        parent::__construct();
        $this->model = $model;
        $this->FK_idBrands = $id_Brands;
    }

    public function create() {
        $req = 'INSERT INTO `Models`(model, id_Brands) VALUES(:model, :id_Brands)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':model', $this->model, PDO::PARAM_STR);
        $sth->bindValue(':id_Brands', $this->FK_idBrands, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $req = 'SELECT id, model, id_Brands FROM `Models`';
        $sth = $this->db->query($req);
        if ($sth instanceof PDOStatement) {
            $models = $sth->fetchAll(PDO::FETCH_OBJ);
            return $models;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAllByBrand($idBrand) {
        $models = [];
        $req = 'SELECT id, model FROM `Models` WHERE `Models`.id_Brands = :id_Brands';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id_Brands', $idBrand);
        $sth->execute();
        if ($sth instanceof PDOStatement) {
            $models = $sth->fetchAll(PDO::FETCH_OBJ);
            return $models;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getOne() {
        $req = 'SELECT model, id_Brands FROM `Models` WHERE `Models`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth instanceof PDOStatement) {
            $model = $sth->fetch(PDO::FETCH_OBJ);
            return $model;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `Models` SET model = :model, id_Brands = :id_Brands';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':model', $this->model, PDO::PARAM_STR);
        $sth->bindValue(':id_Brands', $this->FK_idBrands, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function delete() {
        $req = 'DELETE FROM `Models` WHERE `Models`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

}
