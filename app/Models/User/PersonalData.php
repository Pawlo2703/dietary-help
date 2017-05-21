<?php

namespace Tren\Models\User;

class PersonalData {

    /**
     * 
     * @var id 
     */
    private $id;

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
     * @return int
     */
    public function getId() {
        return $this->id;
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
        $this->height = $height;
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

    public function personalData($id) {
                $this->database->insertRow('person', "(`id`, `weight`,`height`, `state`) VALUES(?,?,?,?)", [$id, $this->weight, $this->height, $this->state]);
    }

    public function loadPersonalData($id) {
        $result = $this->database->getRow('person', "WHERE id = ?", [$id]);

        if (!empty($result)) {
            $this->id = $result['id'];
            $this->weight = $result['weight'];
            $this->height = $result['height'];
            $this->state = $result['state'];
        }
    }

}
