<?php

/**
 * Description of GearBox
 *
 * @author lb
 */
class GearBox extends DataBase {

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
        $req = 'INSERT INTO `GearBox`(type) VALUES(:type)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':type', $this->type, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $req = 'SELECT id, type FROM `GearBox`';
        $sth = $this->db->query($req);
        if ($sth instanceof PDOStatement) {
            $gearBoxes = $sth->fetchAll(PDO::FETCH_OBJ);
            return $gearBoxes;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getOne() {
        $gearBox = [];
        $req = 'SELECT type FROM `GearBox` WHERE id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth instanceof PDOStatement) {
            $gearBox = $sth->fetch(PDO::FETCH_OBJ);
            return $gearBox;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `GearBox` SET type = :type WHERE `GearBox`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function delete() {
        $req = 'DELETE FROM `GearBox` WHERE `GearBox`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return false;
    }

}
