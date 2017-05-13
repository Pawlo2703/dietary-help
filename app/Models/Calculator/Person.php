<?php

namespace Tren\Models\Calculator\Activities;

/**
 * Class Person
 */
class Person {

    /**
     * Basic Metabolism Rate multiplers
     */
    const WEIGHTMULTIPLER = 9.99;
    const HEIGHTMULTIPLER = 6.25;
    const AGEMULTIPLER = 4.92;
    const MALEDIFFERENCE = 5;
    const FEMALEDIFFERENCE = -161;

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

}
