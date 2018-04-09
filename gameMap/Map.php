<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 7:11 PM
 */

Class Map
{
    /**
     * @var MapsCell[] multi-dimensional array of game table
     */
    private $table;

    /**
     * @var integer first dimension of game table
     */
    private $xLength;

    /**
     * @var integer second dimension of game table
     */
    private $yLength;

    /**
     * @var integer[] min and max of first dimension of game table
     */
    private $xPossibleInterval = [3,30];

    /**
     * @var integer[] min and max of second dimension of game table
     */
    private $yPossibleInterval = [4,40];

    /**
     * Is including var in the range?
     * @param integer $e var
     * @param integer[] $range var
     * @return boolean
     */
    protected function intervalValidation(int $e, array $range){
        return ($range[0] <= $e && $range[1] >= $e);
    }

    /**
     * Create table by known parameters
     * @param integer $x first dimension of game table
     * @param integer $y second dimension of game table
     */
    public function createTable(int $x, int $y)
    {
        $this->xLength = $x-1;
        $this->yLength = $y-1;
    }

    /**
     * Create table random size parameters
     */
    public function createRandomTable()
    {
        $this->xLength = rand($this->xPossibleInterval[0], $this->xPossibleInterval[1]);
        $this->yLength = rand($this->yPossibleInterval[0], $this->yPossibleInterval[1]);
    }

    /**
     * Fill all cells game maps of random elements from possible
     * @param  $possibleElement Landscape[] List (one-dimensional array)
     */
    public function fillRandomLandscape(array $possibleElement)
    {
        for ($x = 0; $x <= $this->xLength; $x++) {
            for ($y = 0; $y <= $this->yLength; $y++) {
                $this->table[$x][$y] = new MapsCell($possibleElement[array_rand($possibleElement)]);
            }
        }
    }

    /**
     * Fill all cells game maps of random elements from possible
     * @param $players Player Generate entity
     * @param $types isDestroyed[]
     */
    public function fillRandomEntity(Player $players, array $types)
    {
        for ($x = 0; $x <= $this->xLength; $x++) {
            for ($y = 0; $y <= $this->yLength; $y++) {
                $cell = $this->table[$x][$y];

                foreach ($types as $type) {
                    if (rand(0,4) == 0 and $type->canCompatible($cell->getLandscape()) ) {

                        if ( empty($cell->getEntity()) ) {
                            $cell->addEntity(new Entity($players,$type));
                        } else {
                            $canAttack = false;
                            foreach ($cell->getEntity() as $entity) {
                                if ($entity->player == $players || $type->canAttack($entity->entity) ) {
                                    $canAttack = true;
                                    break;
                                }
                            }
                            if (!$canAttack){
                                $cell->addEntity (new Entity($players,$type));
                            }
                        }

                    }
                }
            }
        }
    }

    /**
     * Visualize game table
     */
    function drawing()
    {
        echo '<table border="1">';
        for ($x = 0; $x <= $this->xLength; $x++) {
            echo '<tr>';
            for ($y = 0; $y <= $this->yLength; $y++) {
                $cell = $this->table[$x][$y];
                echo '<td>' . $cell->getLandscape()->getVisualisation();

                if (!empty($cell->getEntity())) {
                    foreach ($cell->getEntity() as $entity) {
                        $color = $entity->player->getColor();
                        echo "<$color>" . $entity->entity->getVisualisation() . "</$color>";
                    }
                }
                echo '</td>';
            }
            echo '<tr>';
        }
        echo '</table>';
    }
}
