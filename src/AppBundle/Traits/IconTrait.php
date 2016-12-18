<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 18/12/2016
 * Time: 14:27
 */

namespace AppBundle\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IconTrait
{

    /**
     * icon
     *
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    protected $icon;

    /**
     * get Icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * set Icon
     *
     * @param string $icon
     *
     * @return IconTrait
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }
}