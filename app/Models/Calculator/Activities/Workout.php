<?php

namespace Tren\Models\Calculator\Activities;

/**
 * Class Workout
 */
class Workout {
    /* Calories burned per minute of low intensity workout + EPOC */

    const LOWWORKOUT = 7;
    const LOWWORKOUTEPOC = 0.04;

    /* Calories burned per minute of moderate intensity workout + EPOC */
    const MODERATEWORKOUT = 8;
    const MODERATEWORKOUTEPOC = 0.055;

    /* Calories burned per minute of high intensity workout + EPOC */
    const INTENSEWORKOUT = 10;
    const INTENSEWORKOUTEPOC = 0.07;

    /**
     *
     * @var workouttime
     */
    private $workoutTime;

    /**
     *
     * @var workouttimesaweek
     */
    private $workoutTimesPerWeek;

    public function getWorkoutTime() {
        return $this->workouttime;
    }

    public function getWorkoutTimesPerWeek() {
        return $this->workouttimesaweek;
    }

    public function setWorkoutTime($workouttime) {
        $this->workouttime = $workouttime;
    }

    public function setWorkoutTimesPerWeek($workouttimesaweek) {
        $this->workouttimesaweek = $workouttimesaweek;
    }

}
