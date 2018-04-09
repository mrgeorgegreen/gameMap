<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 4/9/2018
 * Time: 8:11 PM
 */

interface isCompatible
{
    /**
     * set compatible Unit, Landscape and Buildings
     * @param isCompatible[] $object
     */
    public function setNonCompatible(array $object);

    /**
     * get compatible Unit, Landscape and Buildings
     * @param isCompatible $object
     * @return boolean
     */
    public function canCompatible(isCompatible $object);
}