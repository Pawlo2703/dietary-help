<?php

namespace Tren\Models\User;

use Tren\Models\User\PersonalData;
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
    
       private $protein2;
    private $carbohydrate2;
    private $fat2;
    private $calories2;

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
            $this->personalData = new PersonalData();
        }
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

        $this->database->insertRow('macro', "(`id`, `protein`,`fat`, `carbohydrate`, `calories`) VALUES(?,?,?,?,?)", [$id, round($this->protein, 0), round($this->fat, 0), round($this->carbohydrate, 0), round($this->calories, 0)]);
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

    public function setGoalMacro($id) {
        if ($this->personalData->getState() == 'Regular bulk') { //to p prostu cardiop
            $this->calories2 = $this->calories * 1.1;
            $this->protein2 = $this->protein * 1.1;
            $this->carbohydrate2 = $this->carbohydrate * 1.1;
            $this->fat2 = $this->fat * 1.1;
        } else if ($this->personalData->getState() == 'Lean bulk') { //to p prostu cardiop
            $this->calories2 = $this->calories * 1.05;
            $this->protein2 = $this->protein * 1.05;
            $this->carbohydrate2 = $this->carbohydrate * 1.05;
            $this->fat2 = $this->fat * 1.05;
        } else if ($this->personalData->getState() == 'Mini cut') { //to p prostu cardiop
            $this->calories2 = $this->calories * 0.75;
            $this->protein2 = $this->protein * 0.75;
            $this->carbohydrate2 = $this->carbohydrate * 0.75;
            $this->fat2 = $this->fat * 0.75;
        } else if ($this->personalData->getState() == 'Long term cut') { //to p prostu cardiop
            $this->calories2 = $this->calories * 0.85;
            $this->protein2 = $this->protein * 0.85;
            $this->carbohydrate2 = $this->carbohydrate * 0.85;
            $this->fat2 = $this->fat * 0.85;
        }
        $protein2 = $this->protein2;
        $fat2 = $this->fat2;
        $carbohydrate2 = $this->carbohydrate2;
        $calories2 = $this->calories2;

        if ($this->id == !null) {
            $this->database->updateRow('user', "protein='$protein2', "
                    . "fat='$fat2', "
                    . "fat='$carbohydrate2', "
                    . "fat='$calories2' "
                    . "WHERE id = $id");
            return;
        }
    }

}
