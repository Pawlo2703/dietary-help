<?php

namespace Tren\Models\Calculator;

/**
 * Class Calculator
 */
class Calculator {

    /* Thermic effect of food */
    const TEF = 0.1;

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
     * Calculates Basic Metabolism Rates
     */
    public function basicMetabolismRate() {

        if ($person->gender == 'Male') {
            $this->bmr = ($person::WEIGHTMULTIPLER * $person->weight) + ($person::HEIGHTMULTIPLER * $person->height) - ($person::AGEMULTIPLER * $person->age) + $person::MALEDIFFERENCE;
        }
        $this->bmr = (self::WEIGHTMULTIPLER * $person->weight) + ($person::HEIGHTMULTIPLER * $person->height) - ($person::AGEMULTIPLER * $person->age) + $person::FEMALEDIFFERENCE;
    }

    public function totalExpenditureActivity() {

        if ($activities->cardio == 'Low') {
            $this->teacardio = (($cardio::LOWCARDIO * $cardio->cardiotime) + $cardio::LOWCARDIOEPOC) * $cardio->cardiotimesaweek;
        } else if ($activities->cardio == 'Moderate') {
            $this->teacardio = (($cardio::MODERATECARDIO * $cardio->cardiotime) + $cardio::MODERATECARDIOEPOC) * $cardio->cardiotimesaweek;
        } else if ($activities->cardio == 'Intense') {
            $this->teacardio = (($cardio::INTENSECARDIO * $cardio->cardiotime) + $cardio::INTENSECARDIOEPOC) * $cardio->cardiotimesaweek;
        }

        if ($activities->workout == 'Low') {
            $this->teaworkout = ($workout::LOWWORKOUT * $workout->workouttime + $workout::LOWWORKOUTEPOC * $this->bmr) * $workout->workouttimesaweek;
        } else if ($this->workout == 'Moderate') {
            $this->teaworkout = ($workout::MODERATEWORKOUT * $workout->workouttime + $workout::MODERATEWORKOUTEPOC * $this->bmr) * $workout->workouttimesaweek;
        } else if ($this->workout == 'Intense') {
            $this->teaworkout = ($workout::INTENSEWORKOUT * $workout->workouttime + $workout::MODERATEWORKOUTEPOC * $this->bmr) * $workout->workouttimesaweek;
        }

        $this->tea = $this->teaworkout + $this->teacardio;
    }

    public function nonExerciseActivityThermogenesis() {

        if ($activities->activity == 'Setendary') {
            $this->neat = ($activities::SETENDARYACTIVITY );
        } else if ($activities->activity == 'Moderate') {
            $this->neat = ($activities::MODERATEACTIVITY);
        } else if ($activities->activity == 'Intense') {
            $this->neat = ($activities::INTENSEACTIVITY );
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
