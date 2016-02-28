<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compose
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComposeRepository")
 */
class Compose
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingredient")
     * @ORM\Id
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Recette", inversedBy="recetteComposes")
     * @ORM\Id
     * @ORM\JoinColumn(nullable=false)
     */
    private $recette;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre", type="integer", nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteUniteMesure", type="integer", nullable=true)
     */
    private $quantiteUniteMesure;

    /**
     * @var string
     *
     * @ORM\Column(name="qualiteAvantIngredient", type="string", length=255, nullable=true)
     */
    private $qualiteAvantIngredient;

    /**
     * @var string
     *
     * @ORM\Column(name="qualiteApresIngredient", type="string", length=255, nullable=true)
     */
    private $qualiteApresIngredient;

    /**
     * @var string
     *
     * @ORM\Column(name="qualiteAvantUniteMesure", type="string", length=255, nullable=true)
     */
    private $qualiteAvantUniteMesure;

    /**
     * @var string
     *
     * @ORM\Column(name="qualiteApresUniteMesure", type="string", length=255, nullable=true)
     */
    private $qualiteApresUniteMesure;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UniteMesure")
     */
    private $uniteMesure;


    /**
     * Set nombre
     *
     * @param integer $nombre
     *
     * @return Compose
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return integer
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set quantiteUniteMesure
     *
     * @param integer $quantiteUniteMesure
     *
     * @return Compose
     */
    public function setQuantiteUniteMesure($quantiteUniteMesure)
    {
        $this->quantiteUniteMesure = $quantiteUniteMesure;

        return $this;
    }

    /**
     * Get quantiteUniteMesure
     *
     * @return integer
     */
    public function getQuantiteUniteMesure()
    {
        return $this->quantiteUniteMesure;
    }

    /**
     * Set qualiteAvantIngredient
     *
     * @param string $qualiteAvantIngredient
     *
     * @return Compose
     */
    public function setQualiteAvantIngredient($qualiteAvantIngredient)
    {
        $this->qualiteAvantIngredient = $qualiteAvantIngredient;

        return $this;
    }

    /**
     * Get qualiteAvantIngredient
     *
     * @return string
     */
    public function getQualiteAvantIngredient()
    {
        return $this->qualiteAvantIngredient;
    }

    /**
     * Set qualiteApresIngredient
     *
     * @param string $qualiteApresIngredient
     *
     * @return Compose
     */
    public function setQualiteApresIngredient($qualiteApresIngredient)
    {
        $this->qualiteApresIngredient = $qualiteApresIngredient;

        return $this;
    }

    /**
     * Get qualiteApresIngredient
     *
     * @return string
     */
    public function getQualiteApresIngredient()
    {
        return $this->qualiteApresIngredient;
    }

    /**
     * Set qualiteAvantUniteMesure
     *
     * @param string $qualiteAvantUniteMesure
     *
     * @return Compose
     */
    public function setQualiteAvantUniteMesure($qualiteAvantUniteMesure)
    {
        $this->qualiteAvantUniteMesure = $qualiteAvantUniteMesure;

        return $this;
    }

    /**
     * Get qualiteAvantUniteMesure
     *
     * @return string
     */
    public function getQualiteAvantUniteMesure()
    {
        return $this->qualiteAvantUniteMesure;
    }

    /**
     * Set qualiteApresUniteMesure
     *
     * @param string $qualiteApresUniteMesure
     *
     * @return Compose
     */
    public function setQualiteApresUniteMesure($qualiteApresUniteMesure)
    {
        $this->qualiteApresUniteMesure = $qualiteApresUniteMesure;

        return $this;
    }

    /**
     * Get qualiteApresUniteMesure
     *
     * @return string
     */
    public function getQualiteApresUniteMesure()
    {
        return $this->qualiteApresUniteMesure;
    }

    /**
     * Set ingredient
     *
     * @param Ingredient $ingredient
     *
     * @return Compose
     */
    public function setIngredient(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get ingredient
     *
     * @return Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Set recette
     *
     * @param Recette $recette
     *
     * @return Compose
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
     * Set uniteMesure
     *
     * @param UniteMesure $uniteMesure
     *
     * @return Compose
     */
    public function setUniteMesure(UniteMesure $uniteMesure = null)
    {
        $this->uniteMesure = $uniteMesure;

        return $this;
    }

    /**
     * Get uniteMesure
     *
     * @return UniteMesure
     */
    public function getUniteMesure()
    {
        return $this->uniteMesure;
    }
}
