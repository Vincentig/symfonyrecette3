<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Famille
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FamilleRepository")
 */
class Famille
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
     * @ORM\Column(name="nom_famille", type="string", length=255)
     */
    private $nomFamille;


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
     * Set nomFamille
     *
     * @param string $nomFamille
     *
     * @return Famille
     */
    public function setNomFamille($nomFamille)
    {
        $this->nomFamille = $nomFamille;

        return $this;
    }

    /**
     * Get nomFamille
     *
     * @return string
     */
    public function getNomFamille()
    {
        return $this->nomFamille;
    }
}

