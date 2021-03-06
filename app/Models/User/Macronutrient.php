<?php

namespace Tren\Models\User;

use Tren\Models\Calculator\Activities\Person;
use Tren\Models\User;

class Macronutrient {

    const FAT_CALORIES = 9;
    const PROTEIN_CALORIES = 4;
    const CARBOHYDRATE_CALORIES = 4;
    const PROTEIN_MULTIPLER = 2.5;
    const FAT_MULTIPLER = 0.35;

    private $id;
    private $protein;
    private $carbohydrate;
    private $fat;
    private $calories;
    private $database;
    private $mealPref;

    public function getDatabase() {
        return $this->database;
    }

    public function getMealPref() {
        return $this->mealPref;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function setMealPref($mealPref) {
        $this->mealPref = $mealPref;
    }

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
        if ($this->database = \Tren\Core\Database::getInstance()) {
            $this->person = new Person();
        }
    }

    public function init($data) {
        $this->person->setWeight($data['weight']);
    }

    public function setMacros($id, $weight) {



        if (($id == !null) && ($this->calories == null) && ($this->protein == !null)) {
            $this->calories = ($this->protein * self::PROTEIN_CALORIES) + ($this->fat * self::FAT_CALORIES) + ($this->carbohydrate * self::CARBOHYDRATE_CALORIES);
        } else if (($id == !null) && ($this->protein == null) && ($this->calories == !null)) {

            $this->protein = $weight * self::PROTEIN_MULTIPLER;
            $this->fat = (($this->calories - ($this->protein * self::PROTEIN_CALORIES)) * self::FAT_MULTIPLER) / self::FAT_CALORIES;
            $this->carbohydrate = ($this->calories - ($this->protein * self::PROTEIN_CALORIES + $this->fat * self::FAT_CALORIES)) / self::CARBOHYDRATE_CALORIES;
        } else if (($id == !null) && ($this->protein == !null) && ($this->calories == !null)) {

            $this->protein = $weight * self::PROTEIN_MULTIPLER;
            $this->fat = (($this->calories - ($this->protein * self::PROTEIN_CALORIES)) * self::FAT_MULTIPLER) / self::FAT_CALORIES;
            $this->carbohydrate = ($this->calories - ($this->protein * self::PROTEIN_CALORIES + $this->fat * self::FAT_CALORIES)) / self::CARBOHYDRATE_CALORIES;
        }

        $result = $this->database->getRow('*', 'macro', "WHERE id = ?", [$id]);

        if ($result > 0) {

            $protein = round($this->protein);
            $fat = round($this->fat);
            $carbohydrate = round($this->carbohydrate);
            $calories = $this->calories;

            $this->database->updateRow('macro', "protein='$protein', "
                    . "fat='$fat', "
                    . "carbohydrate='$carbohydrate', "
                    . "calories='$calories' "
                    . "WHERE id = '$id'");
        } else {

            $this->database->insertRow('macro', "(`id`, `protein`,`fat`, `carbohydrate`, `calories`) VALUES(?,?,?,?,?)", [$id, round($this->protein, 0), round($this->fat, 0), round($this->carbohydrate, 0), round($this->calories, 0)]);
        }
    }

    public function loadMacros($id) {
        $result = $this->database->getRow('*', 'macro', "WHERE id = ?", [$id]);

        if (!empty($result)) {
            $this->id = $result['id'];
            $this->calories = $result['calories'];
            $this->protein = $result['protein'];
            $this->fat = $result['fat'];
            $this->carbohydrate = $result['carbohydrate'];
        }
    }

    public function increaseCaloriesTwice($calories) {
        $this->calories = $calories + 200;
        return $this->calories;
    }

    public function increaseCalories($calories) {
        $this->calories = $calories + 100;
        return $this->calories;
    }

    public function decreaseCalories($calories) {
        $this->calories = $calories - 100;
        return $this->calories;
    }

    public function decreaseCaloriesTwice($calories) {
        $this->calories = $calories - 200;
        return $this->calories;
    }

    public function mealPreferences($id) {
             $this->calories = $this->calories - ($this->protein * self::PROTEIN_CALORIES);

        
        
        if ($this->mealPref == '1') {
            $multipler = 0.8;
        } elseif ($this->mealPref == '2') {
            $multipler = 0.7;
        } elseif ($this->mealPref == '3') {
            $multipler = 0.6;
        } elseif ($this->mealPref == '4') {
            $multipler = 0.5;
        } elseif ($this->mealPref == '5') {
            $multipler = 0.4;
        } elseif ($this->mealPref == '6') {
            $multipler = 0.3;
        }
        $this->carbohydrate = round(($this->calories * $multipler) / self::CARBOHYDRATE_CALORIES);
        $this->fat = round(($this->calories - ($this->carbohydrate * self::CARBOHYDRATE_CALORIES)) / self::FAT_CALORIES);


        $calories = $this->calories + ($this->protein * self::PROTEIN_CALORIES);
        $fat = $this->fat;
        $carbohydrate = $this->carbohydrate;
        $protein = $this->protein;

        $this->database->updateRow('macro', "protein='$protein', "
                . "fat='$fat', "
                . "carbohydrate='$carbohydrate', "
                . "calories='$calories' "
                . "WHERE id = '$id'");
    }

}
