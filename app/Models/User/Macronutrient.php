<?php

namespace Tren\Models\User;

use Tren\Models\User;

class Macronutrient {

    const FAT_CALORIES = 9;
    const PROTEIN_CALORIES = 4;
    const CARBOHYDRATE_CALORIES = 4;
    const PROTEIN_MULTIPLER = 0.25;
    const FAT_MULTIPLER = 0.25;

    private $id;
    private $protein;
    private $carbohydrate;
    private $fat;
    private $calories;
    private $database;

    public function getId() {
        return $this->id;
    }

    public function getProtein() {
        return $this->protein;
    }

    public function getCarbohydrate() {
        return $this->carbohydrate;
    }

    public function getFat() {
        return $this->fat;
    }

    public function getCalories() {
        return $this->calories;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProtein($protein) {
        $this->protein = $protein;
    }

    public function setCarbohydrate($carbohydrate) {
        $this->carbohydrate = $carbohydrate;
    }

    public function setFat($fat) {
        $this->fat = $fat;
    }

    public function setCalories($calories) {
        $this->calories = $calories;
    }

    /**
     * 
     * Class constructor
     */
    public function __construct() {
        $this->database = \Tren\Core\Database::getInstance();
    }

    public function setMacros($id) {

        
        if (($id == !null) && ($this->calories == null) && ($this->protein == !null)) {
            $this->calories = ($this->protein * self::PROTEIN_CALORIES) + ($this->fat * self::FAT_CALORIES) + ($this->carbohydrate * self::CARBOHYDRATE_CALORIES);

//        $this->database->insertRow('macro', "(`id`, `protein`,`fat`, `carbohydrate`, `calories`) VALUES(?,?,?,?,?)", [$id, round($this->protein,0), round($this->fat, 0), round($this->carbohydrate, 0), round($this->calories,0)]);
//       return;
        } else if (($id == !null) && ($this->protein == null) && ($this->calories == !null)) {

          $this->protein = ($this->calories * self::PROTEIN_MULTIPLER) / self::PROTEIN_CALORIES;
            $this->fat = ($this->calories * self::FAT_MULTIPLER) / self::FAT_CALORIES;
           $this->carbohydrate = ($this->calories - ($this->protein * self::PROTEIN_CALORIES + $this->fat * self::FAT_CALORIES)) / self::CARBOHYDRATE_CALORIES;
    
            }

        $this->database->insertRow('macro', "(`id`, `protein`,`fat`, `carbohydrate`, `calories`) VALUES(?,?,?,?,?)", [$id, round($this->protein,0), round($this->fat, 0), round($this->carbohydrate, 0), round($this->calories,0)]);
       
    }

        public function loadMacros($id) {
        $result = $this->database->getRow('macro', "WHERE id = ?", [$id]);

        if (!empty($result)) {
            $this->id = $result['id'];
            $this->calories = $result['calories'];
            $this->protein = $result['protein'];
            $this->fat = $result['fat'];
            $this->carbohydrate = $result['carbohydrate'];
        }
    }
    
}

