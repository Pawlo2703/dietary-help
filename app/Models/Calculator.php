<?php

namespace Tren\Models;

/**
 * Class Calculator
 */
class Calculator {

    /**
     * BMR Multiplers
     */
    const weightMultipler = 9.99;
    const heightMultipler = 6.25;
    const ageMultipler = 4.92;
    const maleDifference = 5;
    const femaleDifference = -161;

    /*
     * Cardio & Workout Multiplers
     */

    /* Calories burned per minute of low intensity cardio + EPOC */
    const lowcardio = 5;
    const lowcardioEPOC = 5;

    /* Calories burned per minute of moderate intensity cardio + EPOC */
    const moderatecardio = 7.5;
    const moderatecardioEPOC = 35;

    /* Calories burned per minute of high intensity cardio + EPOC */
    const intensecardio = 10;
    const intensecardioEPOC = 180;

    /* Calories burned per minute of low intensity workout + EPOC */
    const lowworkout = 7;
    const lowworkoutEPOC = 0.04;

    /* Calories burned per minute of moderate intensity workout + EPOC */
    const moderateworkout = 8;
    const moderateworkoutEPOC = 0.055;

    /* Calories burned per minute of high intensity workout + EPOC */
    const intenseworkout = 10;
    const intenseworkoutEPOC = 0.07;

    /* low level of non-exercise activity thermogenesis */
    const setendaryactivity = 200;

    /* moderate level of non-exercise activity thermogenesis */
    const moderateactivity = 500;

    /* high level of non-exercise activity thermogenesis */
    const intenseactivity = 900;

    /* Thermic effect of food */
    const tef = 0.1;

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
     * @var workout
     */
    private $workout;

    /**
     *
     * @var cardio
     */
    private $cardio;

    /**
     *
     * @var acitivity
     */
    private $activity;

    /**
     *
     * @var bmr
     */
    private $bmr;

    /**
     *
     * @var workouttime
     */
    private $workouttime;

    /**
     *
     * @var cardiotime
     */
    private $cardiotime;

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
     * @var carditimesaweek
     */
    private $cardiotimesaweek;

    /**
     *
     * @var workouttimesaweek
     */
    private $workouttimesaweek;

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

    public function getWorkout() {
        return $this->workout;
    }

    public function getWorkouttime() {
        return $this->workouttime;
    }

    public function getCardio() {
        return $this->cardio;
    }

    public function getCardiotime() {
        return $this->cardiotime;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function getBmr() {
        return $this->bmr;
    }

    public function getTea() {
        return $this->tea;
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

    public function getCardiotimesaweek() {
        return $this->cardiotimesaweek;
    }

    public function getWorkouttimesaweek() {
        return $this->workouttimesaweek;
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

    public function setWorkout($workout) {
        $this->workout = $workout;
    }

    public function setWorkouttime($workouttime) {
        $this->workouttime = $workouttime;
    }

    public function setCardiotime($cardiotime) {
        $this->cardiotime = $cardiotime;
    }

    public function setCardio($cardio) {
        $this->cardio = $cardio;
    }

    public function setActivity($activity) {
        $this->activity = $activity;
    }

    public function setBmr($bmr) {
        $this->bmr = $bmr;
    }

    public function setTea($tea) {
        $this->tea = $tea;
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

    public function setWorkouttimesaweek($workouttimesaweek) {
        $this->workouttimesaweek = $workouttimesaweek;
    }

    public function setCardiotimesaweek($cardiotimesaweek) {
        $this->cardiotimesaweek = $cardiotimesaweek;
    }

    /**
     * Calculates Basic Metabolism Rate
     */
    public function bmr() {

        $weight = $this->weight;
        $height = $this->height;
        $age = $this->age;
        $bmr = $this->bmr;

        if ($this->gender == 'male') {
            $bmr = (self::weightMultipler * $weight) + (self::heightMultipler * $height) - (self::ageMultipler * $age) + self::maleDifference;
          //  return $bmr;
        }
        $bmr = (self::weightMultipler * $weight) + (self::heightMultipler * $height) - (self::ageMultipler * $age) + self::femaleDifference;
      //  return $bmr;
         
    }

    public function tea() {

        $bmr = $this->bmr;
        $tea = $this->tea;
        $cardiotime = $this->cardiotime;
        $workouttime = $this->workouttime;
        $cardiotimesaweek = $this->cardiotimesaweek;
        $workouttimesaweek = $this->workouttimesaweek;



        if ($this->cardio == 'Low') {
            $teacardio = (self::lowcardio * $cardiotime + self::lowcardioEPOC) * $cardiotimesaweek;
          //  return $teacardio;
        } else if ($this->cardio == 'Moderate') {
            $teacardio = (self::moderatecardio * $cardiotime + self::moderatecardioEPOC) * $cardiotimesaweek;
          //  return $teacardio;
        } else if ($this->cardio == 'Intense') {
            $teacardio = (self::intensecardio * $cardiotime + self::intensecardioEPOC) * $cardiotimesaweek;
          //  return $teacardio;
        }

        if ($this->workout == 'Low') {
            $teaworkout = (self::lowworkout * $workouttime + self::lowworkoutEPOC * $bmr) * $workouttimesaweek;
          //  return $teaworkout;
        } else if ($this->workout == 'Moderate') {
            $teaworkout = (self::moderateworkout * $workouttime + self::moderateworkoutEPOC * $bmr) * $workouttimesaweek;
          //  return $teaworkout;
        } else if ($this->workout == 'Intense') {
            $teaworkout = (self::intenseworkout * $workouttime + self::intenseworkoutEPOC * $bmr) * $workouttimesaweek;
          //  return $teaworkout;
        }

        $tea = $teaworkout + $teacardio;
        
    }

    public function neat() {

        if ($this->activity == 'Setendary') {
            $neat = (self::setendaryactivity );  
          //  return $neat;
        } else if ($this->activity == 'Moderate') {
            $neat = (self::moderateactivity);  
          //  return $neat;
        } else if ($this->activity == 'Intense') {
            $neat = (self::intenseactivity );  
          //  return $neat;
        }
        
    }

    public function tef() {
        $bmr = $this->bmr;
        $tea = $this->tea;
        $neat = $this->neat;

        $tef = ($bmr + ($tea / 7) + $neat) * self::tef;
      //  return $tef;
    }

    public function tdee() {
        $bmr = $this->bmr;
        $tea = $this->tea;
        $neat = $this->neat;
        $tef = $this->tef;

        $tdee = $bmr + ($tea / 7) + $neat + $tef;
        var_dump($tdee);
       // return $tdee;
    }

}
