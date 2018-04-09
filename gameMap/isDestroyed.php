<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 7:56 PM
 */

interface isDestroyed
{
    /**
     * set possible attack
     * @param isDestroyed[] $object
     */
    public function setAttackDirection(array $object);

    /**
     * get attack
     * @param isDestroyed $object
     * @return boolean
     */
    public function canAttack(isDestroyed $object);
}