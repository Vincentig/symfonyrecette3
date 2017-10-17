<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Recette
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecetteRepository")
 */
class Recette
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
     * @var integer
     * @ORM\COlumn(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="difficulte", type="integer")
     */
    private $difficulte;

    /**
     * @var integer
     *
     * @ORM\Column(name="temps_realisation", type="integer")
     */
    private $tempsRealisation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_cuisson_min", type="time" , nullable=true)
     */
    private $tempsCuissonMin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_cuisson_max", type="time", nullable=true)
     */
    private $tempsCuissonMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;

    /**
     * @var string
     *
     * @ORM\Column(name="notre_truc", type="text" , nullable=true)
     */
    private $notreTruc;

    /**
     * @var string
     *
     * @ORM\Column(name="conseil_achat", type="text" , nullable=true)
     */
    private $conseilAchat;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite_min", type="integer")
     */
    private $quantiteMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite_max", type="integer" , nullable=true)
     */
    private $quantiteMax;

    /**
     * @var TypeQuantite
     *
     * @ORM\ManyToOne(targetEntity="TypeQuantite", cascade={"persist"})
     */
    private $quantiteType;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Boisson", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $boissons;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie", cascade={"persist"})
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Famille", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Etape", mappedBy="recette", cascade={"persist", "remove"}, orphanRemoval=true)
     * @OrderBy({"numero" = "ASC"})
     */
    private $etapes;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RecetteEndroit", mappedBy="recette", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $recetteEndroits;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Compose", mappedBy="recette", cascade={"persist", "remove"}, orphanRemoval=true)
     * @OrderBy({"position" = "ASC"})
     */
    private $recetteComposes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boissons = new ArrayCollection();
        $this->etapes = new ArrayCollection();
        $this->recetteEndroits = new ArrayCollection();
        $this->recetteComposes = new ArrayCollection();
    }

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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Recette
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Recette
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
     * Set difficulte
     *
     * @param string $difficulte
     *
     * @return Recette
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    /**
     * Get difficulte
     *
     * @return string
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * Set tempsRealisation
     *
     * @param string $tempsRealisation
     *
     * @return Recette
     */
    public function setTempsRealisation($tempsRealisation)
    {
        $this->tempsRealisation = $tempsRealisation;

        return $this;
    }

    /**
     * Get tempsRealisation
     *
     * @return string
     */
    public function getTempsRealisation()
    {
        return $this->tempsRealisation;
    }

    /**
     * Set tempsCuissonMin
     *
     * @param \DateTime $tempsCuissonMin
     *
     * @return Recette
     */
    public function setTempsCuissonMin($tempsCuissonMin)
    {
        $this->tempsCuissonMin = $tempsCuissonMin;

        return $this;
    }

    /**
     * Get tempsCuissonMin
     *
     * @return \DateTime
     */
    public function getTempsCuissonMin()
    {
        return $this->tempsCuissonMin;
    }

    /**
     * Set tempsCuissonMax
     *
     * @param \DateTime $tempsCuissonMax
     *
     * @return Recette
     */
    public function setTempsCuissonMax($tempsCuissonMax)
    {
        $this->tempsCuissonMax = $tempsCuissonMax;

        return $this;
    }

    /**
     * Get tempsCuissonMax
     *
     * @return \DateTime
     */
    public function getTempsCuissonMax()
    {
        return $this->tempsCuissonMax;
    }

    /**
     * Set cout
     *
     * @param string $cout
     *
     * @return Recette
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return string
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set notreTruc
     *
     * @param string $notreTruc
     *
     * @return Recette
     */
    public function setNotreTruc($notreTruc)
    {
        $this->notreTruc = $notreTruc;

        return $this;
    }

    /**
     * Get notreTruc
     *
     * @return string
     */
    public function getNotreTruc()
    {
        return $this->notreTruc;
    }

    /**
     * Set conseilAchat
     *
     * @param string $conseilAchat
     *
     * @return Recette
     */
    public function setConseilAchat($conseilAchat)
    {
        $this->conseilAchat = $conseilAchat;

        return $this;
    }

    /**
     * Get conseilAchat
     *
     * @return string
     */
    public function getConseilAchat()
    {
        return $this->conseilAchat;
    }

    /**
     * Set quantiteMin
     *
     * @param integer $quantiteMin
     *
     * @return Recette
     */
    public function setQuantiteMin($quantiteMin)
    {
        $this->quantiteMin = $quantiteMin;

        return $this;
    }

    /**
     * Get quantiteMin
     *
     * @return integer
     */
    public function getQuantiteMin()
    {
        return $this->quantiteMin;
    }

    /**
     * Set quantiteMax
     *
     * @param integer $quantiteMax
     *
     * @return Recette
     */
    public function setQuantiteMax($quantiteMax)
    {
        $this->quantiteMax = $quantiteMax;

        return $this;
    }

    /**
     * Get quantiteMax
     *
     * @return integer
     */
    public function getQuantiteMax()
    {
        return $this->quantiteMax;
    }

    /**
     * Set quantiteType
     *
     * @param string $quantiteType
     *
     * @return Recette
     */
    public function setQuantiteType($quantiteType)
    {
        $this->quantiteType = $quantiteType;

        return $this;
    }

    /**
     * Get quantiteType
     *
     * @return string
     */
    public function getQuantiteType()
    {
        return $this->quantiteType;
    }

    /**
     * Add boisson
     *
     * @param \AppBundle\Entity\Boisson $boisson
     *
     * @return Recette
     */
    public function addBoisson(Boisson $boisson)
    {
        $this->boissons[] = $boisson;

        return $this;
    }

    /**
     * Remove boisson
     *
     * @param \AppBundle\Entity\Boisson $boisson
     */
    public function removeBoisson(Boisson $boisson)
    {
        $this->boissons->removeElement($boisson);
    }

    /**
     * Get boissons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoissons()
    {
        return $this->boissons;
    }

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Recette
     */
    public function setCategorie(Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set famille
     *
     * @param \AppBundle\Entity\Famille $famille
     *
     * @return Recette
     */
    public function setFamille(Famille $famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \AppBundle\Entity\Famille
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Recette
     */
    public function setPays($pays = null)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add etape
     *
     * @param \AppBundle\Entity\Etape $etape
     *
     * @return Recette
     */
    public function addEtape(Etape $etape)
    {
        $etape->setRecette($this);
        $this->etapes[] = $etape;

        return $this;
    }

    /**
     * Add etape
     *
     * @param \AppBundle\Entity\Etape $etapes
     *
     * @return Recette
     */
    public function setEtapes($etapes)
    {
        $this->etapes = $etapes;

        return $this;
    }

    /**
     * Remove etape
     *
     * @param \AppBundle\Entity\Etape $etape
     */
    public function removeEtape(Etape $etape)
    {
        $this->etapes->removeElement($etape);
    }

    /**
     * Get etapes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtapes()
    {
        return $this->etapes;
    }

    /**
     * Set image
     *
     * @param Media $image
     *
     * @return Recette
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add recetteEndroit
     *
     * @param \AppBundle\Entity\RecetteEndroit $recetteEndroit
     *
     * @return Recette
     */
    public function addRecetteEndroit(RecetteEndroit $recetteEndroit)
    {
        $recetteEndroit->setRecette($this);
        $this->recetteEndroits[] = $recetteEndroit;

        return $this;
    }

    /**
     * Remove recetteEndroit
     *
     * @param \AppBundle\Entity\RecetteEndroit $recetteEndroit
     */
    public function removeRecetteEndroit(RecetteEndroit $recetteEndroit)
    {
        $this->recetteEndroits->removeElement($recetteEndroit);
    }

    /**
     * Get recetteEndroits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecetteEndroits()
    {
        return $this->recetteEndroits;
    }

    /**
     * Add recetteCompose
     *
     * @param \AppBundle\Entity\Compose $recetteCompose
     *
     * @return Recette
     */
    public function addRecetteCompose(Compose $recetteCompose)
    {
        $recetteCompose->setRecette($this);
        $this->recetteComposes[] = $recetteCompose;

        return $this;
    }

    /**
     * Remove recetteCompose
     *
     * @param \AppBundle\Entity\Compose $recetteCompose
     */
    public function removeRecetteCompose(Compose $recetteCompose)
    {
        $this->recetteComposes->removeElement($recetteCompose);
    }

    /**
     * Get recetteComposes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecetteComposes()
    {
        return $this->recetteComposes;
    }

    /**
     * __toString
     *
     * @return string
     *
     */
    public function __toString()
    {
        return (string)$this->getNom();
    }
}
