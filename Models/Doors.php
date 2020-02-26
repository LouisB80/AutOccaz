<?php

/**
 * Description of Doors
 *
 * @author lb
 */
class Doors {

    /**
     * @var type int
     */
    private $id;

    /**
     * @var type int
     */
    private $number;

    public function __construct($number = '') {
        parent::__construct();
        $this->number = $number;
    }

    public function create() {
        $req = 'INSERT INTO `Doors`(number) VALUES(:number)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':number', $this->number, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $req = 'SELECT id, number FROM `Doors`';
        $sth = $this->db->query($req);
        if ($sth->fetchAll(PDO::FETCH_ASSOC)) {
            return $sth;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getOne() {
        $door = [];
        $req = 'SELECT number FROM `Doors` WHERE id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $door = $sth->fetch(PDO::FETCH_ASSOC);
            return $door;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `Doors` SET number = :number WHERE `Doors`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':number', $this->number, PDO::PARAM_INT);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function delete() {
        $req = 'DELETE FROM `Doors` WHERE `Doors`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
}
