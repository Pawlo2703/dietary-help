<?php

namespace Tren\Models\Calculator;

use Tren\Models\Calculator\Activities;
use Tren\Models\Calculator\Activities\Person;
use Tren\Models\Calculator\Activities\Cardio;
use Tren\Models\Calculator\Activities\Workout;
/**
 * Class Calculator
 */
class Calculator  {

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
    
    private $person;

    private $activities;
    
    private $cardio;
    
    private $workout;
    
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
        return $this->tdee;
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
    
    public function __construct() {
        
        $this->person = new Person();
        $this->activities = new Activities();
        $this->cardio = new Cardio();
        $this->workout = new Workout();
    }
    
    /**
     * Initialize all required objects data
     * @param type $data
     */
    public function init($data) {
        //tutaj przenioslem cala inicjalizacje tych danych, ktore bedziesz tu uzywal,, co by controlera nie zasmiecac za bardzo
        //zrozumiale? tak, znaczy, myslalem, ze po to jestr kontroler ;d zeby tam takie rzeczy trzymac. teoretycznie tak
         //ale jak jest mozliwosc to lepiej to przeniesc do modeli i wtedy patrz kontroler
        $this->person->setAge($data['age']);
        $this->person->setWeight($data['weight']);
        $this->person->setHeight($data['height']); 
        $this->person->setGender($data['gender']);
        //nie poprawiaj recznie :D ctrl+r poprawia wszystkie wystapienia,o najs :D
        $this->activities->setCardio($data['cardio']);
        $this->activities->setActivity($data['activity']);
        $this->activities->setWorkout($data['workout']);
                
        $this->cardio->setCardioTimesPerWeek($data['cardiotimesperweek']);
        $this->cardio->setCardioTime($data['cardiotime']);
        
        $this->workout->setWorkoutTime($data['workouttime']);
        $this->workout->setWorkoutTimesPerWeek($data['workouttimesperweek']);    
    }

    public function totalExpenditureActivity() {

        if ($this->activities->getCardio() == 'Low') { //to p prostu cardiop
            $this->teacardio = ((Cardio::LOWCARDIO * $this->cardio->getCardioTime()) + Cardio::LOWCARDIOEPOC) * $this->cardio->getCardioTimesPerWeek();
        } else if ($this->activities->getCardio() == 'Moderate') {
            $this->teacardio = ((Cardio::MODERATECARDIO * $this->cardio->getCardioTime()) + Cardio::MODERATECARDIOEPOC) * $this->cardio->getCardioTimesPerWeek();
        } else if ($this->activities->getCardio() == 'Intense') {
            $this->teacardio = ((Cardio::INTENSECARDIO * $this->cardio->getCardioTime()) + Cardio::INTENSECARDIOEPOC) * $this->cardio->getCardioTimesPerWeek();
        } //pokaz gdzie blad moge pytanko ?y czemu wtedy - wtedy czyli jak wszystko bylo w klasie calculator to w odnosilismy sie do worktime, a teraz potrzebny getworktime jest?
        //bo te zmienne nie sa publiczne, tylko prywatne
        //po to gettery dla nich, czekaj jeszcze jedno, bo literkwka sie zakradla 

        if ($this->activities->getWorkout() == 'Low') {
            $this->teaworkout = (Workout::LOWWORKOUT * $this->workout->getWorkoutTime() + Workout::LOWWORKOUTEPOC * $this->bmr) * $this->workout->getWorkoutTimesPerWeek();
        } else if ($this->activities->getWorkout() == 'Moderate') {
            $this->teaworkout = (Workout::MODERATEWORKOUT * $this->workout->getWorkoutTime() + Workout::MODERATEWORKOUTEPOC * $this->bmr) * $this->workout->getWorkoutTimesPerWeek();
        } else if ($this->activities->getWorkout() == 'Intense') {
            $this->teaworkout = (Workout::INTENSEWORKOUT *$this->workout->getWorkoutTime() + Workout::MODERATEWORKOUTEPOC * $this->bmr) * $this->workout->getWorkoutTimesPerWeek();
        }

        $this->tea = $this->teaworkout + $this->teacardio;
       
    }

    public function nonExerciseActivityThermogenesis() {

        if ($this->activities->getActivity() == 'Setendary') {
            $this->neat = (Activities::SETENDARYACTIVITY );
        } else if ($this->activities->getActivity() == 'Moderate') {
            $this->neat = (Activities::MODERATEACTIVITY);
        } else if ($this->activities->getActivity() == 'Intense') {
            $this->neat = (Activities::INTENSEACTIVITY ); 
        }
    }

    public function thermicEffectOfFood() {
        $this->totalExpenditureActivity();
        $this->nonExerciseActivityThermogenesis();

        $this->tef = ($this->person->getBasicMetabolismRate() + ($this->tea / 7) + $this->neat) * self::TEF;
    }

    public function totalDailyEnergyExpenditure() {
        $this->thermicEffectOfFood();

        $this->tdee = $this->person->getBasicMetabolismRate() + ($this->tea / 7) + $this->neat + $this->tef;
        var_dump($this->tdee);
        return $this->tdee;
            }

}
