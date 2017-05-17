<?php

namespace Tren\Models\User;
use Tren\Models\User;

class Macronutrient {

    private $id;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

        
    const FAT_CALORIES = 9;
    const PROTEIN_CALORIES = 4;
    const CARBOHYDRATE_CALORIES = 4;
    const PROTEIN_MULTIPLER = 2;
    const FAT_MULTIPLER = 0.25;

        public function __construct() {
        $this->user = new User();
    }
    //cos z returnami
    
    public function setMacros($id) {
if (! $this->user->getCalories()) {
        $this->user->getCalories() = ($this->user->getProtein() * self::PROTEIN_CALORIES) + ($this->user->getFat() * self::FAT_CALORIES) + ($this->user->getCarbohydrate() * self::CARBOHYDRATE_CALORIES);
}
        if (($id == !null) && ($this->user->getProtein() == null)) {
          
          return $this->user->getProtein = ($this->user->getWeight * self::PROTEIN_MULTIPLER) / self::PROTEIN_CALORIES;
          return  $this->user->getFat = ($this->user->getCalories * self::FAT_MULTIPLER) / self::FAT_CALORIES;
          return  $this->user->getCarbohydrate = ($this->user->getCalories - ($this->user->getProtein * self::PROTEIN_CALORIES + $this->user->getFat * self::FAT_CALORIES)) / self::CARBOHYDRATE_CALORIES;
        } else if (($this->getId == !null) && ($this->user->getProtein == !null)) {

          return  $this->user->getCalories = ($this->user->getProtein + $this->user->getCarbohydrate) * self::CARBOHYDRATE_CALORIES + $this->user->getFat * self::FAT_CALORIES;
        }
       $this->user->saveMacros($this->user->getId);
    }

}
