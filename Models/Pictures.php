<?php

/**
 * Description of Pictures
 *
 * @author lb
 */
class Pictures {

    /**
     * @var type int
     */
    private $id;

    /**
     * @var type string
     */
    private $pictureName;

    /**
     * @var type string
     */
    private $source;

    /**
     * @var type int
     */
    private $FK_idCars;

    public function __construct($pictureName = '', $source = '', $id_Cars = '') {
        parent::__construct();
        $this->pictureName = $pictureName;
        $this->source = $source;
        $this->FK_idCars = $id_Cars;
    }

    public function create() {
        $req = 'INSERT INTO `Pictures`(pictureName, source, id_Cars) VALUES(:pictureName, :source, :id_Cars)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':pictureName', $this->model, PDO::PARAM_STR);
        $sth->bindValue(':source', $this->source, PDO::PARAM_STR);
        $sth->bindValue(':id_Cars', $this->FK_idCars, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $pictures = [];
        $req = 'SELECT pictureName, source FROM `Pictures` WHERE `Pictures`.id_Cars = :id_Cars';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id_Cars', $this->FK_idCars, PDO::PARAM_INT);
        if ($sth->execute()) {
            $pictures = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $pictures;
        }
        return false;
    }

    public function update() {
        $req = 'UPDATE `Pictures` SET pictureName = :pictureName, source = :source WHERE `Pictures`.id = :id ';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':pictureName', $this->pictureName, PDO::PARAM_STR);
        $sth->bindValue(':source', $this->source, PDO::PARAM_STR);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $req = 'DELETE FROM `Pictures` WHERE `Pictures`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return false;
    }

}
