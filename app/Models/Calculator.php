<?php

namespace Tren\Models;

/**
 * Class Calculator
 */
class Calculator {

    /**
     * BMR Multiplers
     */
    const WEIGHTMULTIPLER = 9.99;
    const HEIGHTMULTIPLER = 6.25;
    const AGEMULTIPLER = 4.92;
    const MALEDIFFERENCE = 5;
    const FEMALEDIFFERENCE = -161;

    /* Thermic effect of food */
    const TEF = 0.1;

    /**
     *
     * @var id
     */
    private $id;

    /**
     *
     * @var age
     */
    private $age;

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
     * @var gender
     */
    private $gender;

    /**
     *
     * @var bmr
     */
    private $bmr;

    /**
     *
     * @var neat 
     */
    private $neat;

    /**
     *
     * @var tef 
     */
    private $tef;

    /**
     *
     * @var tea
     */
    private $tea;

    /**
     *
     * @var teacardio
     */
    private $teacardio;

    /**
     *
     * @var teaworkout
     */
    private $teaworkout;

    public function getId() {
        return $this->id;
    }

    public function getAge() {
        return $this->age;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getBmr() {
        return $this->bmr;
    }

    public function getTea() {
        return $this->tea;
    }

    public function getTeacardio() {
        return $this->teacardio;
    }

    public function getTeaworkout() {
        return $this->teaworkout;
    }

    public function getNeat() {
        return $this->neat;
    }

    public function getTef() {
        return $this->tef;
    }

    public function getTdee() {
        return $this->Tdee;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setBmr($bmr) {
        $this->bmr = $bmr;
    }

    public function setTea($tea) {
        $this->tea = $tea;
    }

    public function setTeaworkout($teaworkout) {
        $this->teaworkout = $teaworkout;
    }

    public function setTeacardio($teacardio) {
        $this->teacardio = $teacardio;
    }

    public function setNeat($neat) {
        $this->neat = $neat;
    }

    public function setTef($tef) {
        $this->tef = $tef;
    }

    public function setTdee($tdee) {
        $this->tdee = $tdee;
    }

    /**
     * Calculates Basic Metabolism Rate
     */
    public function basicMetabolismRate() {

        if ($this->gender == 'Male') {
            $this->bmr = (self::WEIGHTMULTIPLER * $this->weight) + (self::HEIGHTMULTIPLER * $this->height) - (self::AGEMULTIPLER * $this->age) + self::MALEDIFFERENCE;
        }
        $this->bmr = (self::WEIGHTMULTIPLER * $this->weight) + (self::HEIGHTMULTIPLER * $this->height) - (self::AGEMULTIPLER * $this->age) + self::FEMALEDIFFERENCE;
    }

    public function totalExpenditureActivity() {

        if ($this->cardio == 'Low') {
            $this->teacardio = ((self::LOWCARDIO * $this->cardiotime) + self::LOWCARDIOEPOC) * $this->cardiotimesaweek;
        } else if ($this->cardio == 'Moderate') {
            $this->teacardio = ((self::MODERATECARDIO * $this->cardiotime) + self::MODERATECARDIOEPOC) * $this->cardiotimesaweek;
        } else if ($this->cardio == 'Intense') {
            $this->teacardio = ((self::INTENSECARDIO * $this->cardiotime) + self::INTENSECARDIOEPOC) * $this->cardiotimesaweek;
        }

        if ($this->workout == 'Low') {
            $this->teaworkout = (self::LOWWORKOUT * $this->workouttime + self::LOWWORKOUTEPOC * $this->bmr) * $this->workouttimesaweek;
        } else if ($this->workout == 'Moderate') {
            $this->teaworkout = (self::MODERATEWORKOUT * $this->workouttime + self::MODERATEWORKOUTEPOC * $this->bmr) * $this->workouttimesaweek;
        } else if ($this->workout == 'Intense') {
            $this->teaworkout = (self::INTENSEWORKOUT * $this->workouttime + self::MODERATEWORKOUTEPOC * $this->bmr) * $this->workouttimesaweek;
        }
        
        $this->tea = $this->teaworkout + $this->teacardio;
    }

    public function nonExerciseActivityThermogenesis() {

        if ($this->activity == 'Setendary') {
            $this->neat = (self::SETENDARYACTIVITY );
        } else if ($this->activity == 'Moderate') {
            $this->neat = (self::MODERATEACTIVITY);
        } else if ($this->activity == 'Intense') {
            $this->neat = (self::INTENSEACTIVITY );
        }
    }

    public function thermicEffectOfFood() {
        $this->basicMetabolismRate();
        $this->totalExpenditureActivity();
        $this->nonExerciseActivityThermogenesis();

        $this->tef = ($this->bmr + ($this->tea / 7) + $this->neat) * self::TEF;
    }

    public function totalDailyEnergyExpenditure() {
        $this->thermicEffectOfFood();
        
        $this->tdee = $this->bmr + ($this->tea / 7) + $this->neat + $this->tef;
        var_dump($this->tdee);
    }

}
