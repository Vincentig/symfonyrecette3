<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecetteEndroit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecetteEndroitRepository")
 */
class RecetteEndroit
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
     * @var \DateTime
     *
     * @ORM\Column(name="temps_endroit", type="time")
     */
    private $tempsEndroit;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Recette", inversedBy="recetteEndroits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recette;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Endroit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $endroit;

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
     * Set tempsEndroit
     *
     * @param \DateTime $tempsEndroit
     *
     * @return RecetteEndroit
     */
    public function setTempsEndroit($tempsEndroit)
    {
        $this->tempsEndroit = $tempsEndroit;

        return $this;
    }

    /**
     * Get tempsEndroit
     *
     * @return \DateTime
     */
    public function getTempsEndroit()
    {
        return $this->tempsEndroit;
    }

    /**
     * Set recette
     *
     * @param Recette $recette
     *
     * @return RecetteEndroit
     */
    public function setRecette(Recette $recette)
    {
        $this->recette = $recette;

        return $this;
    }

    /**
     * Get recette
     *
     * @return Recette
     */
    public function getRecette()
    {
        return $this->recette;
    }

    /**
     * Set endroit
     *
     * @param Endroit $endroit
     *
     * @return RecetteEndroit
     */
    public function setEndroit(Endroit $endroit)
    {
        $this->endroit = $endroit;

        return $this;
    }

    /**
     * Get endroit
     *
     * @return Endroit
     */
    public function getEndroit()
    {
        return $this->endroit;
    }
}
