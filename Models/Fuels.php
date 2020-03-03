<?php

/**
 * Description of Fuels
 *
 * @author lb
 */
class Fuels extends DataBase{

    /**
     * @var type int
     */
    private $id;

    /**
     * @var type string
     */
    private $type;

    public function __construct($type = '') {
        parent::__construct();
        $this->type = $type;
    }

    public function create() {
        $req = 'INSERT INTO `Fuels`(type) VALUES(:type)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':type', $this->type, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $req = 'SELECT id, type FROM `Fuels`';
        $sth = $this->db->query($req);
        if ($sth instanceof PDOStatement){
            $fuels = $sth->fetchAll(PDO::FETCH_OBJ);
            return $fuels;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getOne() {
        $req = 'SELECT type FROM `Fuels` WHERE id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth instanceof PDOStatement) {
            $fuel = $sth->fetch(PDO::FETCH_OBJ);
            return $fuel;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `Fuels` SET type = :type WHERE id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':type', $this->type, PDO::PARAM_STR);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function delete() {
        $req = 'DELETE FROM `Fuels` WHERE id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

}
