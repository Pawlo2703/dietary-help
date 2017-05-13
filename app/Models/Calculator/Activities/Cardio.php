<?php

namespace Tren\Models\Calculator\Activities;


/**
 * Class Cardio
 */
class Cardio {
    
    /* Calories burned per minute of low intensity cardio + EPOC */
    const LOWCARDIO = 5;
    const LOWCARDIOEPOC = 5;

    /* Calories burned per minute of moderate intensity cardio + EPOC */
    const MODERATECARDIO = 7.5;
    const MODERATECARDIOEPOC = 35;

    /* Calories burned per minute of high intensity cardio + EPOC */
    const INTENSECARDIO = 10;
    const INTENSECARDIOEPOC = 180;

    /**
     *
     * @var cardiotime
     */
    private $cardioTime;

    /**
     *
     * @var carditimesaweek
     */
    private $cardioTimesPerWeek;

    public function getCardioTime() {
        return $this->cardiotime;
    }

    public function getCardioTimesPerWeek() {
        return $this->cardiotimesaweek;
    }

    public function setCardioTime($cardiotime) {
        $this->cardiotime = $cardiotime;
    }

    public function setCardioTimesPerWeek($cardiotimesaweek) {
        $this->cardiotimesaweek = $cardiotimesaweek;
    }

}
