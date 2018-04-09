<?php

function __autoload($classname) {
    $file = 'gameMap/' . $classname . '.php';
    if (is_readable($file)) {
        include_once($file);
    }
}

$mountains = new Landscape('mountains', 'M');
$water = new Landscape('water','W');
$swamp = new Landscape('swamp', 'S');
$plain = new Landscape('plain', 'P');

$technics = new Unit('technics', 'T');
$human = new Unit('Human', 'H');
$airplanes = new Unit('airplanes', 'A');

$base = new Building('Base', 'B');

$airplanes->setAttackDirection([$technics]);
$technics->setAttackDirection([$technics, $human]);
$human->setAttackDirection([$human, $technics]);
$base->setAttackDirection([$base,$technics,$human,$airplanes]);

$technics->setNonCompatible([$mountains, $water]);
$human->setNonCompatible([$swamp]);
$airplanes->setNonCompatible([]);
$base->setNonCompatible([$mountains,$water,$swamp]);

$player01 = new Player('Player1', 'P1', 'green');
$player02 = new Player('Player2', 'P2', 'red');


$map = new Map();
$map->createTable(10,10);

$map->fillRandomLandscape([$mountains,$water,$swamp,$plain]);

$map->fillRandomEntity($player01, [$technics, $human, $airplanes, $base]);
$map->fillRandomEntity($player02, [$technics, $human, $airplanes, $base]);

$map->drawing();


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
