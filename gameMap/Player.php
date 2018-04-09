<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 7:16 PM
 */

Class Player implements isVisualized
{
    /** @var string */
    private $description;

    /**
     * @var string
     */
    private $visualisation;

    /**
     * @var string
     */
    private $color;

    /**
     * @param $description string
     * @param $visualisation string
     * @param $color string
     */
    function __construct(string $description, string $visualisation, string $color)
    {
        $this->description = $description;
        $this->visualisation = $visualisation;
        $this->color = $color;
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
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}