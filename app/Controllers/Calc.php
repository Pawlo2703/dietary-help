<?php

namespace Tren\Controllers;

use Tren\Core\Controller;
use Tren\Models\Calculator;

/**
 * Class Calc
 */
class Calc extends Controller {

    /**
     * Displays calculator form
     */
    public function User() {

        $this->view('home/calculator');
    }

    /**
     * 
     */
    public function saveMacros() {
        $user = new Calculator();
        $id = ($this->session->get('zmienna2'));

        $user->setAge($this->getParam('age'));
        $user->setWeight($this->getParam('weight'));
        $user->setHeight($this->getParam('height'));
        $user->setGender($this->getParam('gender'));        
        $user->setCardio($this->getParam('cardio'));
        $user->setCardiotime($this->getParam('cardiotime'));
        $user->setCardiotimesaweek($this->getParam('cardiotimesaweek'));
        $user->setWorkout($this->getParam('workout'));
        $user->setWorkouttime($this->getParam('workouttime'));
        $user->setWorkouttimesaweek($this->getParam('workouttimesaweek'));        
        $user->setActivity($this->getParam('activity'));
        $user->setTdee($user->totaldailyEnergyExpenditure());
    }

    /**
     * Displays form
     */
    public function userTwo() {

        $this->view('home/details');
    }

    /**
     * Saves user data
     */
    public function saveDetails() {
        $user = new User();
        $id = ($this->session->get('zmienna2'));

        $user->setWeight($this->getParam('weight'));
        $user->setState($this->getParam('state'));

        $user->saveDetails($id);

        header("Location: http://localhost/Tren/public/UserDetails/display");
    }

}
