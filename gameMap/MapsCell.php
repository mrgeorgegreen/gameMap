<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 10:30 PM
 */

class MapsCell
{
    /** @var $landscape Landscape */
    private $landscape;

    /** @var $entity[] Entity */
    private $entity = [];

    /** In same cell was bee only one entity military unit
     * @param $landscape Landscape
     * @param $entity Entity
     */
    public function __construct(Landscape $landscape)
    {
        $this->landscape = $landscape;
    }

    /** @param $entity Entity */
    public function addEntity(Entity $entity)
    {
        $this->entity[] = $entity;
    }

    /**
     * @return Entity[]
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return Landscape
     */
    public function getLandscape()
    {
        return $this->landscape;
    }
}