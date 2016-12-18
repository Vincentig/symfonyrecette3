<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 18/12/2016
 * Time: 14:33
 */

namespace AppBundle\Model;


use AppBundle\Interfaces\Iconable;
use AppBundle\Traits\IconTrait;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractCategorise
 * @ORM\MappedSuperclass()
 *
 * @package AppBundle\Model
 */
abstract class AbstractCategorise implements Iconable
{
    use IconTrait;

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return mixed
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return ucfirst($this->nom);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNom();
    }
}