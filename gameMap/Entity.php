<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 10:29 PM
 */

class Entity
{

    /** @var $player Player */
    public $player;

    /** @var $entity isDestroyed */
    public $entity;

    public function __construct(Player $player, isDestroyed $entity)
    {
        $this->player = $player;
        $this->entity = $entity;
    }

    /**
     * @return isDestroyed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}