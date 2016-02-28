<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaysRepository")
 */
class Pays
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="isocode2", type="string", length=255, unique=true)
     */
    private $isocode2;

    /**
     * @var string
     *
     * @ORM\Column(name="isocode3", type="string", length=255, unique=true)
     */
    private $isocode3;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Pays
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
        return $this->nom;
    }

    /**
     * Set isocode2
     *
     * @param string $isocode2
     *
     * @return Pays
     */
    public function setIsocode2($isocode2)
    {
        $this->isocode2 = $isocode2;

        return $this;
    }

    /**
     * Get isocode2
     *
     * @return string
     */
    public function getIsocode2()
    {
        return $this->isocode2;
    }

    /**
     * Set isocode3
     *
     * @param string $isocode3
     *
     * @return Pays
     */
    public function setIsocode3($isocode3)
    {
        $this->isocode3 = $isocode3;

        return $this;
    }

    /**
     * Get isocode3
     *
     * @return string
     */
    public function getIsocode3()
    {
        return $this->isocode3;
    }
}

