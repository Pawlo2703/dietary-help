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
        $id = $this->id;

        if ($this->id == !null) {
            $this->database->updateRow('user', "login='$login', "
                    . "password='$password', "
                    . "WHERE id = $id");
            return;
        }
        $this->database->insertRow('user', "(`login`, `password`) VALUES(?,?)", [$this->login, $this->password]);
    }

    /**
     * User register
     */
    public function register() {
        $this->database->insertRow('user', "( `login`, `password`) VALUES(?,?)", [$this->login, $this->password]);
    }

}
