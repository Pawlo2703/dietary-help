<?php

namespace Tren\Models\Calculator\Activities;

use Tren\Models\Calculator\Calculator;

/**
 * Class Person
 */
class Person { //czemu rozszerzales o calc?  person nie ma raczej duzego zwizku z calculatorem. czekaj restart bo tnie mi tv

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
    private $age = 0;

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
    private $state;
    private $id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function getState() {
        return $this->state;
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

    public function setState($state) {
        $this->state = $state;
    }

    public function __construct() {
        $this->database = \Tren\Core\Database::getInstance();
    }

    public function init($data) {
        $this->setWeight($data['weight']);
        $this->setHeight($data['height']);
        $this->setState($data['state']);
    }

    /**
     * Calculates Basic Metabolism Rates
     */
    public function getBasicMetabolismRate() {
        //tej zmiennej $person tu nie ma zadeklarowanej????
        // znaczy dalem ja private $person tylko
        //a drugi blad to nie wiem co probujesz zrobic w [ ] ?? // to po prostu juz probowalem ktoregos z kolei sposob ;d $this-> person tez robilem\
        //person ma byc obiektem klasy person? nie, obiekt to gender, chyba..
        //no to czym ma byc wg. Ciebie ten $person tuta? tablica/obiekt/string/int ? kurde nie wiem :(
        //no to od tego powinienes zaczac szukanie problemu, a potem zadeklarowac ta zmienna, bo bez deklaracji do niczego sie nie odwolasz
        //no i nie mozesz robic [$this->gender == 'Male'] tak, bo  [] to odowolanie sie do tablicy, a to co dales w srodku to warunek jest, ze jezeli $this->gender == 'Male' to zwroci true
        //zgaduje ze $person ma byc obiektem tej klasy co zrobiles
        if ($this->gender == 'Male') {
            return (self::WEIGHTMULTIPLER * $this->weight) +
                    (self::HEIGHTMULTIPLER * $this->height) - (self::AGEMULTIPLER * $this->age) + self::MALEDIFFERENCE;
        }
        //to co masz tutaj wyzej, zawsze zostanie nadpisane przez ten kod tutaj nizej, znaczy, jak dam return to wtedy bedzie ok tak? tak
        return (self::WEIGHTMULTIPLER * $this->weight) +
                (self::HEIGHTMULTIPLER * $this->height) - (self::AGEMULTIPLER * $this->age) + self::FEMALEDIFFERENCE; //tzn teoretycznie mozesz uzyc $this->person::CONSTANT ale lepiej odwolac sie do nazwy klasy
        //self uzywasz jak jestes wewnatrz klasy w ktorej masz constanty, tak jest sir , to wiem :D
        //wiesz co w ogole mysle ze fajnie by bylo BMR przeniesc do Person, bo tylko do osoby sie to odnosci prawda? wiec nie mas ensu liczyc tego tutaj, tylko mozna
        //dac w $this->person->getBasicMetabolismRate() i zwrocic juz odpowiedni wynik, co Ty na to? xD faza, to wtedy, trzebaby bylo dac do activities.
        //nie wiem co to te cardio ale jezeli widzisz to sensowniej tam, to mysle ze tak. ja tutaj na przykladzie bmr CI przeniose
    }

    public function personalData($id) {
        $this->database->insertRow('person', "(`id`, `weight`,`height`, `state`) VALUES(?,?,?,?)", [$id, $this->weight, $this->height, $this->state]);
    }

    public function loadPersonalData($id) {
        $result = $this->database->getRow('person', "WHERE id = ?", [$id]);
        if (!empty($result)) {
            $this->id = $result['id'];
            $this->weight = $result['weight'];
            $this->height = $result['height'];
            $this->state = $result['state'];
        }
    }

}
