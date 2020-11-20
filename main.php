<?php

include 'hero.php';

function attack(Hero &$attacker, Hero &$defender) {
    $att = $attacker->getAttack()[2];
    $def = $defender->getDefence()[2];
    list(, ,$luck) = $defender->getLuck()[2];
    $roll=rand(0,100);
    if ($roll < $luck) $damage = 0;
    else {
        $damage = $att - $def;
        if ($damage < 0) $damage = 0;
        if ($damage > 100) $damage = 100;
        $defender->takeDamage($damage);
    }
}

$carl = new Hero(array(65,95), array(60,70), array(40,50), array(40,50), array(10, 30));
$beast = new Hero(array(55, 80), array(50, 80), array(35, 55), array(40, 60), array(25,40));

$carl->calculateStats();
$beast->calculateStats();


if( $carl->getSpeed()[2] > $beast->getSpeed()[2] ){
    echo "Carl attacks first! <br>";
    $start = 0;
}
else if( $carl->getSpeed()[2] < $beast->getSpeed()[2] ) {
    echo "The Beast attacks first! <br>";
    $start = 1;
}
else {
    $start = rand(0,1);
    if ($start == 0) {
        echo "Carl attacks first! <br>";
    }
    else {
        echo "The Beast attack first! <br>";
    }
}


while ( !($carl->isDead() || $beast->isDead())) {
    if ($start == 0) {
        attack($carl, $beast);
        echo "The Beast has ".$beast->getHealth()[2]." HP left <br>";
    }
    else {
        attack($beast, $carl);
        echo "Carl has ".$carl->getHealth()[2]." HP left <br>";
    }
    $start = ($start == 0) ? 1 : 0;
}

?>