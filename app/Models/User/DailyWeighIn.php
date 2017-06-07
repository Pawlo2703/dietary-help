<?php

namespace Tren\Models\User;

use Tren\Models\User;
use Tren\Models\Calculator\Activities\Person;
use Tren\Models\User\Macronutrient;

class DailyWeighIn {

    const REQUIRED_DAYS = 2;

    private $id;
    private $weight;
    private $data;
    private $database;
    private $avgWeight;
    private $avgWeightLW;

    public function getAvgWeightLW() {
        return $this->avgWeightLW;
    }

    public function setAvgWeightLW($avgWeightLW) {
        $this->avgWeightLW = $avgWeightLW;
    }

    public function getAvgWeight() {
        return $this->avgWeight;
    }

    public function setAvgWeight($avgWeight) {
        $this->avgWeight = $avgWeight;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getId() {
        return $this->user_id;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getDatabase() {
        return $this->database;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    /**
     * 
     * Class constructor
     */
    public function __construct() {
        if ($this->database = \Tren\Core\Database::getInstance()) {
            $this->macros = new Macronutrient();
        }
    }

    public function getSevenWeights($id) {
        $result = $this->database->getRows('weight', 'weight', "WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) AND user_id = ?", [$id]);


        if ((count($result)) >= self::REQUIRED_DAYS) {
            $result2 = $this->database->getRows('sum(weight)', 'weight', "WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) AND user_id = ?", [$id]);
        } else {
            echo "not enough weigh ins during this week";
        }
        $this->avgWeight = round($result2[0]['sum(weight)']) / count($result);
        return $this->avgWeight;
    }

    public function getSevenWeightsLastWeek($id) {
        $result = $this->database->getRows('weight', 'weight', "WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW())-1 AND user_id = ?", [$id]);


        if ((count($result)) >= self::REQUIRED_DAYS) {
            $result2 = $this->database->getRows('sum(weight)', 'weight', "WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW())-1 AND user_id = ?", [$id]);
        } else {

            // echo "not enough weigh ins during this week";
            return;
        }
        $this->avgWeightLW = round($result2[0]['sum(weight)']) / count($result);

        return $this->avgWeightLW;
    }

    public function macroUpdate($state, $calories) {

        $difference = $this->avgWeight - $this->avgWeightLW;


        if ($state == 'Lean bulk') {

            if ($difference <= 0.2 && $difference > -20) {
                return $this->macros->increaseCalories($calories);
            } else if ($difference <= 0.4 && $difference > 0.2) {
                echo "prztrzymac";
            } else if ($difference <= 3 && $difference > 0.4) {
                return $this->macros->decreaseCalories($calories);
            }
        } else if ($state == 'Regular bulk') {

            if ($difference <= 0.1 && $difference > -20) {
                return $this->macros->increaseCaloriesTwice($calories);
            } else if ($difference <= 0.3 && $difference > 0.1) {
                return $this->macros->increaseCalories($calories);
            } else if ($difference <= 0.6 && $difference > 0.3) {
                echo "przytrzymac";
            } else if ($difference <= 3 && $difference > 0.6) {
                return $this->macros->decreaseCalories($calories);
            }
        } else if ($state == 'Mini cut') {

            if ($difference <= 0.2 && $difference > 20) {
                return $this->macros->decreaseCaloriesTwice();
            } else if ($difference <= 0.5 && $difference > 0.2) {
                return $this->macros->decreaseCalories();
            } else if ($difference <= 3 && $difference > 0.5) {
                echo "przytrzymać";
            }
        } else if ($state == 'Long term cut') {

            if ($difference <= 0.2 && $difference > 20) {
                return $this->macros->decreaseCaloriesTwice();
            } else if ($difference <= 0.3 && $difference > 0.2) {
                return $this->macros->decreaseCalories();
            } else if ($difference <= 3 && $difference > 0.3) {
                echo "przytrzymać";
            }
        }
    }

}
