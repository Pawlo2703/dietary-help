<?php

namespace Tren\Models\Calculator;

/**
 * Class Activities
 */
class Activities {
    
    /* low level of non-exercise activity thermogenesis */
    const SETENDARYACTIVITY = 200;

    /* moderate level of non-exercise activity thermogenesis */
    const MODERATEACTIVITY = 500;

    /* high level of non-exercise activity thermogenesis */
    const INTENSEACTIVITY = 900;

    /**
     *
     * @var cardio
     */
    private $cardio;

    /**
     *
     * @var workout
     */
    private $workout;

    /**
     *
     * @var acitivity
     */
    private $activity;

    public function getWorkout() {
        return $this->workout;
    }

    public function getCardio() {
        return $this->cardio;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function setWorkout($workout) {
        $this->workout = $workout;
    }

    public function setActivity($activity) {
        $this->activity = $activity;
    }

    public function setCardio($cardio) {
        $this->cardio = $cardio;
    }

}
