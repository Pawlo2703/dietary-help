<?php

namespace Tren\Models;

class Activities {
    
    /*
     * Cardio & Workout Multiplers
     */

    /* Calories burned per minute of low intensity cardio + EPOC */
    const LOWCARDIO = 5;
    const LOWCARDIOEPOC = 5;

    /* Calories burned per minute of moderate intensity cardio + EPOC */
    const MODERATECARDIO = 7.5;
    const MODERATECARDIOEPOC = 35;

    /* Calories burned per minute of high intensity cardio + EPOC */
    const INTENSECARDIO = 10;
    const INTENSECARDIOEPOC = 180;

    /* Calories burned per minute of low intensity workout + EPOC */
    const LOWWORKOUT = 7;
    const LOWWORKOUTEPOC = 0.04;

    /* Calories burned per minute of moderate intensity workout + EPOC */
    const MODERATEWORKOUT = 8;
    const MODERATEWORKOUTEPOC = 0.055;

    /* Calories burned per minute of high intensity workout + EPOC */
    const INTENSEWORKOUT = 10;
    const INTENSEWORKOUTEPOC = 0.07;

    /* low level of non-exercise activity thermogenesis */
    const SETENDARYACTIVITY = 200;

    /* moderate level of non-exercise activity thermogenesis */
    const MODERATEACTIVITY = 500;

    /* high level of non-exercise activity thermogenesis */
    const INTENSEACTIVITY = 900;
    
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
     * @var carditimesaweek
     */
    private $cardiotimesaweek;

    /**
     *
     * @var workouttimesaweek
     */
    private $workouttimesaweek;

    public function get_workout() {
        return $this->workout;
    }

    public function get_cardio() {
        return $this->cardio;
    }

    public function get_activity() {
        return $this->activity;
    }

    public function get_workouttime() {
        return $this->workouttime;
    }

    public function get_cardiotime() {
        return $this->cardiotime;
    }

    public function get_cardiotimesaweek() {
        return $this->cardiotimesaweek;
    }

    public function get_workouttimesaweek() {
        return $this->workouttimesaweek;
    }

    public function set_workout($workout) {
        $this->workout = $workout;
    }

    public function set_cardio($cardio) {
        $this->cardio = $cardio;
    }

    public function set_activity($activity) {
        $this->activity = $activity;
    }

    public function set_workouttime($workouttime) {
        $this->workouttime = $workouttime;
    }

    public function set_cardiotime($cardiotime) {
        $this->cardiotime = $cardiotime;
    }

    public function set_cardiotimesaweek($cardiotimesaweek) {
        $this->cardiotimesaweek = $cardiotimesaweek;
    }

    public function set_workouttimesaweek($workouttimesaweek) {
        $this->workouttimesaweek = $workouttimesaweek;
    }
    
}