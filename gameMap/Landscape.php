<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 7:14 PM
 */

Class Landscape implements isVisualized, isCompatible
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $visualisation;

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
