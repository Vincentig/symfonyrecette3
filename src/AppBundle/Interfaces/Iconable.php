<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 18/12/2016
 * Time: 14:17
 */

namespace AppBundle\Interfaces;

/**
 * Interface Iconable
 *
 * @package AppBundle\Interfaces
 */
interface Iconable
{
    /**
     * getIcon
     *
     * @return string
     */
    public function getIcon();

    /**
     * setIcon
     *
     * @param string $icon
     *
     * @return mixed
     */
    public function setIcon($icon);

}