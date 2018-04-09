<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 7:15 PM
 */

Class Unit implements isVisualized, isDestroyed
{
    /** @var string */
    private $description;

    /**
     * @var string
     */
    private $visualisation;

    /**
     * @var isDestroyed[] $object
     */
    private $strongerList = [];

    /**
     * @var isCompatible[] $object
     */
    private $nonCompatibleList = [];

    /**
     * @param $description string
     * @param $visualisation string
     */
    function __construct(string $description, string $visualisation)
    {
        $this->description = $description;
        $this->visualisation = $visualisation;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getVisualisation()
    {
        return $this->visualisation;
    }

    /**
     * set possible attack
     * @param isDestroyed[] $object
     */
    public function setAttackDirection(array $object)
    {
        $this->strongerList = $object;
    }

    /**
     * get attack
     * @param isDestroyed $object
     * @return boolean
     */
    public function canAttack(isDestroyed $object)
    {
        foreach ($this->strongerList as $stronger) {
            if ($stronger === $object) {
                return true;
            }
        }
        return false;
    }

    /**
     * set compatible Unit, Landscape and Buildings
     * @param isCompatible[] $objects
     */
    public function setNonCompatible(array $objects)
    {
        $this->nonCompatibleList = $objects;
    }

    /**
     * get compatible Unit, Landscape and Buildings
     * @param isCompatible $object
     * @return boolean
     */
    public function canCompatible(isCompatible $object)
    {
        foreach ($this->nonCompatibleList as $nonCompatible) {
            if ($nonCompatible === $object) {
                return false;
            }
        }
        return true;
    }
}