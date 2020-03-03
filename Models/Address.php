<?php
require_once 'Config/DataBase.php';
/**
 * Description of Address
 * @author lb
 */
class Address extends DataBase{
    /**
     * @var type int
     */
    private $id;
    /**
     * @var type string
     */
    private $zipCode;
    /**
     * @var type string
     */
    private $city;
    /**
     * @var type string
     */
    private $address;
    
    /**
     * @var type bool
     */
    private $mainAddress;
    
    /**
     * @var type int
     */
    private $FK_idUsers;
    
    public function __construct($zipCode = '', $city = '', $address = '', $mainAddress = true, $FK_idUsers = '') {
        parent::__construct();
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->address = $address;
        $this->mainAddress = $mainAddress;
        $this->FK_idUsers = $FK_idUsers;
    }
    public function create() {
        $req = 'INSERT INTO `Address`(zipCode, city, address, mainAddress, id_Users) VALUES(:zipCode, :city, :address, :mainAddress, :id_Users)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':zipCode', $this->zipCode, PDO::PARAM_STR);
        $sth->bindValue(':city', $this->city, PDO::PARAM_STR);
        $sth->bindValue(':address', $this->address, PDO::PARAM_STR);
        $sth->bindValue(':mainAddress', $this->mainAddress, PDO::PARAM_BOOL);
        $sth->bindValue(':id_Users', $this->FK_idUsers, PDO::PARAM_INT);
        ($sth->execute()) ? true : die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    public function getAllAddress() {
        $addressList = [];
        $req = 'SELECT zipCode, city, address, mainAddress FROM `Address` WHERE id_Users = :id_Users';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id_Users', $this->FK_idUsers, PDO::PARAM_INT);
        if($sth instanceof PDOStatement) {            
            $addressList = $sth->fetchAll(PDO::FETCH_OBJ); 
            return $addressList;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');     
    }
    public function update() {
        $req = 'UPDATE `Address` SET `Address`.zipCode = :zipCode, `Address`.city = :city, `Address`.address = :address, `Address`.mainAddress = :mainAddress WHERE `Address`.id_Users = :id_Users ';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':zipCode', $this->zipCode, PDO::PARAM_STR);
        $sth->bindValue(':city', $this->city, PDO::PARAM_STR);
        $sth->bindValue(':address', $this->address, PDO::PARAM_STR);
        $sth->bindValue(':mainAddress', $this->mainAddress, PDO::PARAM_BOOL);
        $sth->bindValue(':id_Users', $this->FK_idUsers, PDO::PARAM_INT);
        ($sth->execute()) ? true : die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');        
    }
    public function deleteAddress() {
        $req = 'DELETE FROM `Address` WHERE `Address`.id = :id AND `Address`.id_Users = :id_Users';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':id_Users', $this->id_Users, PDO::PARAM_INT);
        ($sth->execute()) ? true : die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
           
}
