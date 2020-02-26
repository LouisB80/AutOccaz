<?php

require_once 'Config/DataBase.php';

/**
 * Description of Cars
 * @author lb
 */
class Cars extends DataBase {

    /**
     * @var type int
     */
    private $id;

    /**
     * @var type int 
     */
    private $identifiedNumber;
    
    /**
     * @var type string 
     */
    private $immat;

    /**
     * @var type Date 
     */
    private $year;

    /**
     * @var type Date 
     */
    private $firstRegistration;

    /**
     * @var type int 
     */
    private $mileage;

    /**
     * @var type string
     */
    private $color;

    /**
     * @var type int 
     */
    private $seat;

    /**
     * @var type bool 
     */
    private $firstHand;

    /**
     * @var type int 
     */
    private $fiscalPower;

    /**
     * @var type int
     */
    private $power;

    /**
     * @var type bool 
     */
    private $leasing;

    /**
     * @var type bool 
     */
    private $sell;

    /**
     * @var type bool 
     */
    private $smoker;

    /**
     * @var type int 
     */
    private $view;

    /**
     * @var type int 
     */
    private $FK_idBrands;

    /**
     * @var type int 
     */
    private $FK_idDoors;

    /**
     * @var type int 
     */
    private $FK_idGearBox;

    /**
     * @var type int 
     */
    private $FK_idFuels;

    /**
     * @var type int 
     */
    private $FK_idUsers;

    public function __construct($immat = '', $identifiedNumber = '', $year = '', $firstRegistration = '', $mileage = '', $color = '', $seat = '', $firstHand = '', $fiscalPower = '', $power = '', $leasing = false, $sell = true, $smoker = false, $view = '', $id_Brands = '', $id_Doors = '', $id_GearBox = '', $id_Fuels = '', $id_Users = '') {
        parent::__construct();
        $this->immat = $immat;
        $this->identifiedNumber = $identifiedNumber;
        $this->year = $year;
        $this->firstRegistration = $firstRegistration;
        $this->mileage = $mileage;
        $this->color = $color;
        $this->seat = $seat;
        $this->firstHand = $firstHand;
        $this->fiscalPower = $fiscalPower;
        $this->power = $power;
        $this->leasing = $leasing;
        $this->sell = $sell;
        $this->smoker = $smoker;
        $this->view = $view;
        $this->FK_idBrands = $id_Brands;
        $this->FK_idDoors = $id_Doors;
        $this->FK_idGearBox = $id_GearBox;
        $this->FK_idFuels = $id_Fuels;
        $this->FK_idUsers = $id_Users;
    }

    public function create() {
        $req = 'INSERT INTO `Cars`(immat, year, firstRegistration, mileage, color, seat, firstHand, fiscalPower, power, leasing, sell, smoker, id_Brands, id_Doors, id_GearBox, id_Fuels, id_Users) VALUES(:immat, :year, :firstRegistration, :mileage, :color, :seat, :firstHand, :fiscalPower, :power, :leasing, :sell, :smoker, :id_Brands, :id_Doors, :id_GearBox, :id_Fuels, :id_Users)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':immat', $this->immat, PDO::PARAM_STR);
        $sth->bindValue(':year', $this->year, PDO::PARAM_STR);
        $sth->bindValue(':firstRegistration', $this->firstRegistration, PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->mileage, PDO::PARAM_INT);
        $sth->bindValue(':color', $this->color, PDO::PARAM_STR);
        $sth->bindValue(':seat', $this->seat, PDO::PARAM_INT);
        $sth->bindValue(':firstHand', $this->firstHand, PDO::PARAM_BOOL);
        $sth->bindValue(':fiscalPower', $this->fiscalPower, PDO::PARAM_INT);
        $sth->bindValue(':power', $this->power, PDO::PARAM_INT);
        $sth->bindValue(':leasing', $this->leasing, PDO::PARAM_BOOL);
        $sth->bindValue(':sell', $this->sell, PDO::PARAM_BOOL);
        $sth->bindValue(':smoker', $this->smoker, PDO::PARAM_BOOL);
        $sth->bindValue(':id_Brands', $this->id_Brands, PDO::PARAM_INT);
        $sth->bindValue(':id_Doors', $this->id_Doors, PDO::PARAM_INT);
        $sth->bindValue(':id_GearBox', $this->id_GearBox, PDO::PARAM_INT);
        $sth->bindValue(':id_Fuels', $this->id_Fuels, PDO::PARAM_INT);
        $sth->bindValue(':id_Users', $this->id_Users, PDO::PARAM_INT);
        ($sth->execute()) ? true : die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $carsList = [];
        $req = 'SELECT immat, year, firstRegistration, mileage, color, seat, firstHand, fiscalPower, power, leasing, sell, smoker, id_Brands, id_Doors, id_GearBox, id_Fuels, id_Users FROM `Cars`';
        $sth = $this->db->query($req);
        if ($sth) {
            $carsList = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $carsList;
        } else {
            return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
        }
    }

    public function getOne() {
        $cars = [];
        $req = 'SELECT immat, year, firstRegistration, mileage, color, seat, firstHand, fiscalPower, power, leasing, sell, smoker, id_Brands, id_Doors, id_GearBox, id_Fuels, id_Users FROM `Cars` WHERE `Cars`.id = :id';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $cars = $sth->fetch(PDO::FETCH_ASSOC);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getPopulars() {
        $cars = [];
        $req = 'SELECT color, brand, model, pictureName, source FROM `Cars` INNER JOIN `Brands` ON `Cars`.id_Brands = `Brands`.id INNER JOIN `Models` ON `Cars`.id_Brands = `Models`.id_Brands INNER JOIN `Pictures` ON `Cars`.id = `Pictures`.id_Cars ORDER BY view LIMIT 5';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $cars = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getRecents() {
        $cars = [];
        $req = 'SELECT color, brand, model, pictureName, source FROM `Cars` INNER JOIN `Brands` ON `Cars`.id_Brands = `Brands`.id INNER JOIN `Models` ON `Cars`.id_Brands = `Models`.id_Brands INNER JOIN `Pictures` ON `Cars`.id = `Pictures`.id_Cars ORDER BY `Cars`.id DESC LIMIT 10';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $cars = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getRentedCars() {
        $cars = [];
        $req = 'SELECT color, brand, model, pictureName, source FROM `Cars` INNER JOIN `Brands` ON `Cars`.id_Brands = `Brands`.id INNER JOIN `Models` ON `Cars`.id_Brands = `Models`.id_Brands INNER JOIN `Pictures` ON `Cars`.id = `Pictures`.id_Cars WHERE `Cars`.leasing = 1';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $cars = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getSellsCars() {
        $cars = [];
        $req = 'SELECT color, brand, model, pictureName, source FROM `Cars` INNER JOIN `Brands` ON `Cars`.id_Brands = `Brands`.id INNER JOIN `Models` ON `Cars`.id_Brands = `Models`.id_Brands INNER JOIN `Pictures` ON `Cars`.id = `Pictures`.id_Cars WHERE `Cars`.sell = 1 ';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $cars = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `Cars` SET immat = :immat, year = :year, firstRegistration = :firstRegistration, mileage = :mileage, color = :color, seat = :seat, firstHand = :firstHand, fiscalPower = :fiscalPower, power = :power, leasing = :leasing, sell = :sell, smoker = :smoker, id_Brands = :id_Brands, id_Doors = :id_Doors, id_GearBox = :id_GearBox, id_Fuels = :id_Fuels WHERE `Cars`.id = :id AND id_Users = :id_Users';
        $sth = $this->db->pepare($req);
        $sth->bindValue(':immat', $this->immat, PDO::PARAM_STR);
        $sth->bindValue(':year', $this->year, PDO::PARAM_STR);
        $sth->bindValue(':firstRegistration', $this->firstRegistration, PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->mileage, PDO::PARAM_INT);
        $sth->bindValue(':color', $this->color, PDO::PARAM_STR);
        $sth->bindValue(':seat', $this->seat, PDO::PARAM_INT);
        $sth->bindValue(':firstHand', $this->firstHand, PDO::PARAM_BOOL);
        $sth->bindValue(':fiscalPower', $this->fiscalPower, PDO::PARAM_INT);
        $sth->bindValue(':power', $this->power, PDO::PARAM_INT);
        $sth->bindValue(':leasing', $this->leasing, PDO::PARAM_BOOL);
        $sth->bindValue(':sell', $this->sell, PDO::PARAM_BOOL);
        $sth->bindValue(':smoker', $this->smoker, PDO::PARAM_BOOL);
        $sth->bindValue(':id_Brands', $this->FK_idBrands, PDO::PARAM_INT);
        $sth->bindValue(':id_Doors', $this->FK_idDoors, PDO::PARAM_INT);
        $sth->bindValue(':id_GearBox', $this->FK_idGearBox, PDO::PARAM_INT);
        $sth->bindValue(':id_Fuels', $this->FK_idFuels, PDO::PARAM_INT);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':id_Users', $this->FK_idUsers, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function delete() {
        $req = 'DELETE FROM `Cars` WHERE `Cars`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

}
