<?php

namespace Tren\Models;

use Tren\Models\User\Macronutrient;

/**
 * 
 * Class User
 */
class User {

    /**
     * 
     * @var id 
     */
    private $id;

    /**
     * 
     * @var login
     */
    private $login;

    /**
     *
     * @var password
     */
    private $password;

    /**
     *
     * @var weight
     */
    private $weight;

    /**
     *
     * @var height
     */
    private $height;

    /**
     *
     * @var age
     */
    private $age;

    /**
     *
     * @var state
     */
    private $state;

    /**
     *
     * @var database
     */
    private $database;

        /**
     *
     * @var protein
     */
    private $protein;

    /**
     *
     * @var carbohydrate
     */
    private $carbohydrate;

    /**
     *
     * @var fat
     */
    private $fat;

    /**
     *
     * @var calories
     */
    private $calories;

    /**
     * 
     * @return string
     */
    public function getProtein() {
        return $this->protein;
    }

    /**
     * 
     * @return string
     */
    public function getCarbohydrate() {
        return $this->carbohydrate;
    }

    /**
     * 
     * @return string
     */
    public function getFat() {
        return $this->fat;
    }

    /**
     * 
     * @return string
     */
    public function getCalories() {
        return $this->calories;
    }

    /**
     * 
     * @param string $protein
     */
    public function setProtein($protein) {
        $this->protein = $protein;
    }

    /**
     * 
     * @param string $carbohydrate
     */
    public function setCarbohydrate($carbohydrate) {
        $this->carbohydrate = $carbohydrate;
    }

    /**
     * 
     * @param string $fat
     */
    public function setFat($fat) {
        $this->fat = $fat;
    }

    /**
     * 
     * @param string $state
     */
    public function setCalories($calories) {
        $this->calories = $calories;
    }
    
    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * 
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * 
     * @return string
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * 
     * @return string
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * 
     * @return int
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * 
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * 
     * @param int $id
     */
    public function setId($id) {
        $this->login = $id;
    }

    /**
     * 
     * @param string $login
     */
    public function setLogin($login) {
        $this->login = $login;
    }

    /**
     * 
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * 
     * @param string $weight
     */
    public function setWeight($weight) {
        $this->weight = $weight;
    }

    /**
     * 
     * @param string $height
     */
    public function setHeight($height) {
        $this->weight = $height;
    }

    /**
     * 
     * @param int $age
     */
    public function setAge($age) {
        $this->weight = $age;
    }

    /**
     * 
     * @param string $state
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * 
     * Class constructor
     */
    public function __construct() {
        $this->database = \Tren\Core\Database::getInstance();
      //  
    }

    /**
     * Searchs for an user ID by his login
     * @param string $login
     * @return int
     */
    public function findByLogin($login) {
        $result = $this->database->getRow('user', "WHERE login = ?", [$login]);
        return isset($result['id']) ? $result['id'] : 0;
    }

    /**
     * Searchs for an user password by his ID
     * @param int $id
     * @return string
     */
    public function checkPassword($id) {
        $result = $this->database->getRow('user', "WHERE id = ?", [$id]);
        return isset($result['password']) ? $result['password'] : 0;
    }

    /**
     * Selects user by given ID
     * @param int $id
     */
    public function load($id) {
        $result = $this->database->getRow('user', "WHERE id = ?", [$id]);

        if (!empty($result)) {
            $this->id = $result['id'];
            $this->login = $result['login'];
            $this->password = $result['password'];
            $this->protein = $result['protein'];
            $this->fat = $result['fat'];
            $this->carbohydrate = $result['carbohydrate'];
            $this->weight = $result['weight'];
            $this->state = $result['state'];
        }
    }

    /**
     * Deletes user by given ID
     *
     */
    public function delete() {
        if ($this->id) {
            $this->database->deleteRow('user', "WHERE id = ?", [$this->id]);
            return;
        }
    }

    /**
     * Saves data as new row if ID is null , otherwise updates rows
     *
     */
    public function save() {
        $login = $this->login;
        $password = $this->password;
        $protein = $this->protein;
        $fat = $this->fat;
        $carbohydrate = $this->carbohydrate;
        $weight = $this->weight;
        $state = $this->state;
        $id = $this->id;

        if ($this->id == !null) {
            $this->database->updateRow('user', "login='$login', "
                    . "password='$password', "
                    . "protein='$protein', "
                    . "fat='$fat', "
                    . "carbohydrate='$carbohydrate', "
                    . "weight='$weight', "
                    . "state='$state' "
                    . "WHERE id = $id");
            return;
        }
        $this->database->insertRow('user', "(`login`, `password`, `protein`, `fat`, `carbohydrate`, `weight`, `state`) VALUES(?,?,?,?,?,?,?)", [$this->login, $this->password, $this->protein, $this->fat, $this->carbohydrate, $this->weight, $this->state]);
    }

    /**
     * User register
     */
    public function register() {
        $this->database->insertRow('user', "( `login`, `password`) VALUES(?,?)", [$this->login, $this->password]);
    }

    /**
     * Updates user data
     */
    public function saveMacros($id) {
        
        
    $this->macronutrient = new Macronutrient();
    
    $this->macronutrient->setMacros($id);
    
        $protein = $this->protein;
        $fat = $this->fat;
        $carbohydrate = $this->carbohydrate;
        $calories = $this->calories;

        $this->database->updateRow('user', "protein='$protein', "
                . "fat='$fat', "
                . "carbohydrate='$carbohydrate', "
                . "calories='$calories'"
                . "WHERE id = $id");
        return;
    }

    /*
     * Updates user data
     */

    public function saveDetails($id) {

        $weight = $this->weight;
        $state = $this->state;



        if ($id == !null) {
            $this->database->updateRow('user', "weight='$weight', "
                    . "state='$state' "
                    . "WHERE id = $id");
            return;
        }
    }

    public function calculateCalories() {
        $protein = $this->protein;
        $fat = $this->fat;
        $carbohydrate = $this->carbohydrate;
        $calories = $this->calories;

        $calories = ($protein + $carbohydrate) * 4 + $fat * 9;
        print_r($calories);
        return $calories;
    }

}
