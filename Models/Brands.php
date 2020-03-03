<?php
require_once 'Config/DataBase.php';
/**
 * Description of Brand
 * @author lb
 */
class Brands extends DataBase{
    /**
     * @var type int
     */
    private $id;
    /**
     * @var type string
     */
    private $brand;
    
    public function __construct($brand = '') {
        parent::__construct();
        $this->brand = $brand;
    }
    public function create() {
        $req = 'INSERT INTO `Brands`(brand) VALUES(:brand)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        ($sth->execute()) ? true : die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    public function getAll() {
        $brandList = [];
        $req = 'SELECT id, brand FROM `Brands`';
        $sth = $this->db->query($req);        
        if($sth instanceof PDOStatement) {            
            $brandList = $sth->fetchAll(PDO::FETCH_OBJ); 
            return $brandList;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');      
    }
    public function getOne() {
        $brand = [];
        $req = 'SELECT brand FROM `Brands` WHERE `Brands`.id = :id ';
        $sth = $this->db->prepare($req);;
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($sth instanceof PDOStatement) {
            $brand = $sth->fetch(PDO::FETCH_OBJ);
            return $brand;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    public function update() {
        $req = 'UPDATE `Brands` SET `Brands`.brand = :brand WHERE `Brands`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        ($sth->execute()) ? true : die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    public function delete() {
        $req = 'DELETE FROM `Brands` WHERE `Brands`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        ($sth->execute()) ? true :  die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
}
