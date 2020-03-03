<?php

require_once 'Config/DataBase.php';

/**
 * Description of User
 * @author lb
 */
class User extends DataBase {

    /**
     * @var type int 
     */
    private $id;

    /**
     * @var type string 
     */
    private $lastName;

    /**
     * @var type string
     */
    private $firstName;

    /**
     * @var type string
     */
    private $password;

    /**
     * @var type string
     */
    private $mail;

    /**
     * @var type string
     */
    private $phoneNumber;

    /**
     * @var type bool
     */
    private $disabled;

    /**
     * @var type bool
     */
    private $displayPhone;

    public function __construct($lastName = '', $firstName = '', $password = '', $mail = '', $phoneNumber = '', $disabled = false, $displayPhone = false) {
        parent::__construct();
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->password = $password;
        $this->mail = $mail;
        $this->phoneNumber = $phoneNumber;
        $this->disabled = $disabled;
        $this->displayPhone = $displayPhone;
    }

    public function create() {
        $req = 'INSERT INTO `Users`(lastName, firstName, mail, password, phoneNumber, disabled, displayPhone) VALUES(:lastName, :firstName, :mail, :password, :phoneNumber, :disabled, :displayPhone)';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $sth->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $sth->bindValue(':disabled', $this->disabled, PDO::PARAM_BOOL);
        $sth->bindValue(':displayPhone', $this->displayPhone, PDO::PARAM_BOOL);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getAll() {
        $users = [];
        $req = 'SELECT lastName, firstName, mail, password, phoneNumber, displayPhone FROM `Users`';
        $sth = $this->db->query($req);
        $sth->execute();
        if ($sth instanceof PDOStatement) {
            $users = $sth->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function getOneByMail($mail) {
        $user = [];
        $req = 'SELECT id, lastName, firstName, password, phoneNumber, displayPhone FROM `Users` WHERE `Users`.mail = :mail';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sth->execute();
        if ($sth instanceof PDOStatement) {
            $user = $sth->fetch(PDO::FETCH_OBJ);
            return $user;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function update() {
        $req = 'UPDATE `Users` SET lastName = :lastName, firstName = :firstName, mail = :mail, password = :password, phoneNumber = :phoneNumber, disabled = :disabled, displayPhone = :displayPhone';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $sth->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $sth->bindValue(':disabled', $this->disabled, PDO::PARAM_BOOL);
        $sth->bindValue(':displayPhone', $this->displayPhone, PDO::PARAM_BOOL);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

    public function delete() {
        $req = 'DELETE FROM `Users` WHERE `Users`.id = :id';
        $sth = $this->db->prepare($req);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        return die('Erreur lors de l\'éxécution de la requête, veuillez contacter l\'administrateur');
    }

}
