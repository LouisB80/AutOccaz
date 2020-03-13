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
    private $price;


    /**
     * @var type int 
     */
    private $FK_idModels;

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

    public function __construct($immat = '', $identifiedNumber = '', $year = '', $firstRegistration = '', $mileage = '', $color = '', $seat = '', $firstHand = false, $fiscalPower = '', $power = '', $leasing = false, $sell = true, $smoker = false, $id_Models = '', $id_Doors = '', $id_GearBox = '', $id_Fuels = '', $id_Users = '', $price = '', $view = '') {
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
        $this->FK_idModels = $id_Models;
        $this->FK_idDoors = $id_Doors;
        $this->FK_idGearBox = $id_GearBox;
        $this->FK_idFuels = $id_Fuels;
        $this->FK_idUsers = $id_Users;
        $this->view = $view;
        $this->price = $price;
    }

    public function create() {
        $req = 'INSERT INTO `Cars`(immat, identifiedNumber, year, firstRegistration, mileage, color, seat, firstHand, fiscalPower, power, leasing, sell, smoker, id_Models, id_Doors, id_GearBox, id_Fuels, id_Users, view, price) VALUES(:immat, :identifiedNumber, :year, :firstRegistration, :mileage, :color, :seat, :firstHand, :fiscalPower, :power, :leasing, :sell, :smoker, :id_Models, :id_Doors, :id_GearBox, :id_Fuels, :id_Users, :view, :price)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':immat', $this->immat, PDO::PARAM_STR);
        $sth->bindValue(':identifiedNumber', $this->identifiedNumber, PDO::PARAM_STR);
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
        $sth->bindValue(':id_Models', $this->FK_idModels, PDO::PARAM_INT);
        $sth->bindValue(':id_Doors', $this->FK_idDoors, PDO::PARAM_INT);
        $sth->bindValue(':id_GearBox', $this->FK_idGearBox, PDO::PARAM_INT);
        $sth->bindValue(':id_Fuels', $this->FK_idFuels, PDO::PARAM_INT);
        $sth->bindValue(':id_Users', $this->FK_idUsers, PDO::PARAM_INT);
        $sth->bindValue(':view', $this->view, PDO::PARAM_INT);
        $sth->bindValue(':price', $this->price, PDO::PARAM_INT);
        if($sth->execute()) {
            $id = $this->db->lastInsertId();
            $this->id = $id;
            return $this->id;
        } else {
            return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
        }
    }

    public function getAll() {
        $carsList = [];
        $req = 'SELECT immat, year, firstRegistration, mileage, color, seat, firstHand, fiscalPower, power, leasing, sell, smoker, id_Models, id_Doors, id_GearBox, id_Fuels, id_Users, price FROM `Cars`';
        $sth = $this->db->query($req);
        if ($sth instanceof PDOStatement) {
            $carsList = $sth->fetchAll(PDO::FETCH_OBJ);
            return $carsList;
        } else {
            return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
        }
    }

    public function getOne($id_Cars) {
        $cars = [];
        $req = 'SELECT Cars.id, immat, identifiedNumber, year, firstRegistration, mileage, color, GearBox.type, `Fuels`.type AS fuel, Doors.number, seat, firstHand, fiscalPower, power, leasing, sell, smoker, model, brand, id_Doors, id_GearBox, id_Fuels, id_Brands, id_Models, id_Users, price FROM `Cars` INNER JOIN `Models` ON `Cars`.id_Models = `Models`.id INNER JOIN `Brands` ON `Models`.id_Brands = `Brands`.id INNER JOIN `Doors` ON `Cars`.id_Doors = `Doors`.id INNER JOIN `GearBox` ON `Cars`.id_GearBox = `GearBox`.id INNER JOIN `Fuels` ON `Cars`.id_Fuels = `Fuels`.id WHERE `Cars`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $id_Cars, PDO::PARAM_INT);
        $sth->execute();
        if ($sth instanceof PDOStatement) {
            $cars = $sth->fetch(PDO::FETCH_OBJ);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getAllByUserId($id_User) {
        $cars = [];
        $req = 'SELECT `Cars`.id, immat, model, brand, price FROM `Cars` INNER JOIN `Models` ON `Cars`.id_Models = `Models`.id INNER JOIN `Brands` ON `Models`.id_Brands = `Brands`.id WHERE `Cars`.id_Users = :id_User';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id_User', $id_User, PDO::PARAM_INT);
        $sth->execute();
        if ($sth instanceof PDOStatement) {
            $cars = $sth->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getPopulars() {
        $cars = [];
        $req = 'SELECT color, brand, model, price FROM `Cars` INNER JOIN `Models` ON `Cars`.id_Models = `Models`.id INNER JOIN `Brands` ON `Models`.id_Brands = `Brands`.id ORDER BY view LIMIT 5';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth instanceof PDOStatement) {
            $cars = $sth->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getRecents() {
        $cars = [];
        $req = 'SELECT color, brand, model, price FROM `Cars` INNER JOIN `Models` ON `Cars`.id_Models = `Models`.id INNER JOIN `Brands` ON `Models`.id_Brands = `Brands`.id ORDER BY `Cars`.id DESC LIMIT 10';
        $sth = $this->db->query($req);
        if ($sth instanceof PDOStatement) {
            $cars = $sth->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getRentedCars() {
        $cars = [];
        $req = 'SELECT color, brand, model, price FROM `Cars` INNER JOIN `Models` ON `Cars`.id_Models = `Models`.id INNER JOIN `Brands` ON `Models`.id_Brands = `Brands`.id WHERE `Cars`.leasing = 1 ORDER BY brand ASC';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth instanceof PDOStatement) {
            $cars = $sth->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }
    
    public function getSellsCars() {
        $cars = [];
        $req = 'SELECT color, brand, model, price FROM `Cars` INNER JOIN `Models` ON `Cars`.id_Models = `Models`.id INNER JOIN `Brands` ON `Models`.id_Brands = `Brands`.id WHERE `Cars`.sell = 1 ORDER BY brand ASC';
        $sth = $this->db->query($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth instanceof PDOStatement) {
            $cars = $sth->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `Cars` SET immat = :immat, year = :year, firstRegistration = :firstRegistration, mileage = :mileage, color = :color, seat = :seat, firstHand = :firstHand, fiscalPower = :fiscalPower, power = :power, leasing = :leasing, sell = :sell, smoker = :smoker, id_Models = :id_Models, id_Doors = :id_Doors, id_GearBox = :id_GearBox, id_Fuels = :id_Fuels, price = :price WHERE `Cars`.id = :id AND id_Users = :id_Users';
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
        $sth->bindValue(':id_Models', $this->FK_idModels, PDO::PARAM_INT);
        $sth->bindValue(':id_Doors', $this->FK_idDoors, PDO::PARAM_INT);
        $sth->bindValue(':id_GearBox', $this->FK_idGearBox, PDO::PARAM_INT);
        $sth->bindValue(':id_Fuels', $this->FK_idFuels, PDO::PARAM_INT);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->bindValue(':price', $this->price, PDO::PARAM_INT);
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
