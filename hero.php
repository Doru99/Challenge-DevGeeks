<?php

class Hero {
    protected $health = array();
    protected $attack = array();
    protected $defence = array();
    protected $speed = array();
    protected $luck = array();

    public function __construct($health, $attack, $defence, $speed, $luck) {
        for ($i=0; $i<2; $i++ ) {
            $this->health[$i] = $health[$i];
            $this->attack[$i] = $attack[$i];
            $this->defence[$i] = $defence[$i];
            $this->speed[$i] = $speed[$i];
            $this->luck[$i] = $luck[$i];
        }
    }

    public function setHealth($lowerH, $upperH) {
        $this->health[0] = $lowerH;
        $this->health[1] = $upperH;
    }

    public function getHealth() {
        return $this->health;
    }

    public function setAttack($lowerA, $upperA) {
        $this->attack[0] = $lowerH;
        $this->attack[1] = $upperA;
    }

    public function getAttack() {
        return $this->attack;
    }

    public function setDefence($lowerD, $upperD) {
        $this->defence[0] = $lowerD;
        $this->defence[1] = $upperD;
    }

    public function getDefence() {
        return $this->defence;
    }

    public function setSpeed($lowerS, $upperS) {
        $this->speed[0] = $lowerS;
        $this->speed[1] = $upperS;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setLuck($lowerL, $upperL) {
        $this->luck[0] = $lowerL;
        $this->luck[1] = $upperL;
    }

    public function getLuck() {
        return $this->luck;
    }

    public function isDead() {
        if ($this->health[2] < 0) return 1;
        else return 0;
    }

    public function takeDamage($damage) {
        $this->health[2] -= $damage;
    }

    public function battleStats($health, $attack, $defence, $speed, $luck) {
        $this->health[2] = $health;
        $this->attack[2] = $attack;
        $this->defence[2] = $defence;
        $this->speed[2] = $speed;
        $this->luck[2] = $luck;
    }

    public function getBattleStats() {
        return array($this->health[2], $this->attack[2], $this->defence[2], $this->speed[2], $this->luck[2]);
    }

    public function calculateStats() {
        list($value1, $value2) = $this->getHealth();
        $health = rand($value1, $value2);
        list($value1, $value2) = $this->getAttack();
        $attack = rand($value1, $value2);
        list($value1, $value2) = $this->getDefence();
        $defence = rand($value1, $value2);
        list($value1, $value2) = $this->getSpeed();
        $speed = rand($value1, $value2);
        list($value1, $value2) = $this->getLuck();
        $luck = rand($value1, $value2);
        $this->battleStats($health, $attack, $defence, $speed, $luck);
    }

    public function displayStats() {
        list($health, $attack, $defence, $speed, $luck) = $this->getBattleStats();
        echo $health." ";
        echo $attack." ";
        echo $defence." ";
        echo $speed." ";
        echo $luck;
        echo "<br>";
    }

}

?>