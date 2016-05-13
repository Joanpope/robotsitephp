<?php

namespace Models\Business;

use Models\DAO\HTTPRequest as HTTPRequest;
use Models\DAO\WorkerDAO as WorkerDAO;
use Models\Business\DataObject as DataObject;

class User extends DataObject {

    protected $id;
    protected $username;
    protected $password;
    protected $nif;
    protected $name;
    protected $surname;
    protected $mobile;
    protected $telephone;
    protected $category;
    protected $team;
    protected $isAdmin;

    function __construct($id = null, $username = null, $password = null, $isAdmin = null, $nif = null, $name = null, $surname = null, $mobile = null, $telephone = null, $category = null, $team = null) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setIsAdmin($isAdmin);
        $this->setNif($nif);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setMobile($mobile);
        $this->setTelephone($telephone);
        $this->setCategory($category);
        $this->setTeam($team);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        if (strlen($password) == 40) {
            $this->password = $password;
        } else {
            $this->password = sha1($password);
        }
    }
    
    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }
    
    function getIsAdmin() {
        return $this->isAdmin;
    }

    public function getNif() {
        return $this->nif;
    }

    public function setNif($nif) {
        $this->nif = $nif;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getTeam() {
        return $this->team;
    }

    public function setTeam($team) {
        $this->team = $team;
    }

    public function authenticate() {
        $workerDAO = new WorkerDAO();
        $users = $workerDAO->getAll();
        $valid = false;
        if (!empty($users)) {
            foreach ($users as $user) {
                if ($this->getUsername() == $user->getUsername() && $this->getPassword() == $user->getPassword()) {
                    $this->setId($user->getId());
                    $this->setIsAdmin($user->getIsAdmin());
                    $valid = true;
                    break;
                }
            }
        }
        return $valid;
    }
    public function logout(){
        Session::destroy('user');
    }


}

?>
