<?php

function __autoload($classname) {
    $file = 'gameMap/' . $classname . '.php';
    if (is_readable($file)) {
        include_once($file);
    }
}

//Initialization landscape parts of map
//Create Landscape objects
$mountains = new Landscape('mountains', 'M');
$water = new Landscape('water','W');
$swamp = new Landscape('swamp', 'S');
$plain = new Landscape('plain', 'P');

//Initialization Types Units
//Create Unit objects
$technics = new Unit('technics', 'T');
$human = new Unit('Human', 'H');
$airplanes = new Unit('airplanes', 'A');

//Initialization Base
$base = new Building('Base', 'B');

//For isDestroyed create battle relation
$airplanes->setAttackDirection([$technics]);
$technics->setAttackDirection([$technics, $human]);
$human->setAttackDirection([$human, $technics]);
$base->setAttackDirection([$base,$technics,$human,$airplanes]);

//For isCompatible create compatible landscape and battle Units and Bases
$technics->setNonCompatible([$mountains, $water]);
$human->setNonCompatible([$swamp]);
$airplanes->setNonCompatible([]);
$base->setNonCompatible([$mountains,$water,$swamp]);

//Create gamers
$player01 = new Player('Player1', 'P1', 'green');
$player02 = new Player('Player2', 'P2', 'red');

//Create map and set size of game table
$map = new Map();
$map->createTable(10,10);

//Generate random surface
$map->fillRandomLandscape([$mountains,$water,$swamp,$plain]);

//Generate battle unit (Entity) of Player1 on the table
$map->fillRandomEntity($player01, [$technics, $human, $airplanes, $base]);
//Generate battle unit (Entity) of Player2 on the table, and check battle Direction, like coming army
$map->fillRandomEntity($player02, [$technics, $human, $airplanes, $base]);

//draw Map
$map->drawing();

//Draw annotation
echo '<br>';
$color = $player01->getColor();
echo "<$color>" . $player01->getDescription() . "</$color>";
echo '<br>';
$color = $player02->getColor();
echo "<$color>" . $player02->getDescription() . "</$color>";

$printObjects = ['mountains','water','swamp','plain','technics','human','airplanes','base'];
foreach ($printObjects as $object) {
    echo '<br>'.get_class($$object).' '.$$object->getVisualisation().'-'.$$object->getDescription();
}

?>

<style>
    red {
        background-color: red;
        color: black;
    }

    green {
        background-color: green;
        color: black;
    }
</style>
