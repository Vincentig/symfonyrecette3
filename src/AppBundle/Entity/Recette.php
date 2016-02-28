<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="difficulte", type="string", length=255)
     */
    private $difficulte;

    /**
     * @var \string
     *
     * @ORM\Column(name="temps_realisation", type="string", length=255)
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
     * @var string
     *
     * @ORM\Column(name="cout", type="string", length=255)
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
     * @var string
     *
     * @ORM\Column(name="quantite_type", type="string", length=255)
     */
    private $quantiteType;

    /**
     * @var string
     *
     * @ORM\Column(name="boisson", type="string", length=255 , nullable=true)
     */
    private $boisson;


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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pays" )
     */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Etape", mappedBy="recette", cascade={"persist"})
     */
    private $etapes;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RecetteEndroit", mappedBy="recette", cascade={"persist"})
     */
    private $recetteEndroits;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Compose", mappedBy="recette", cascade={"persist"})
     */
    private $recetteComposes;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set boisson
     *
     * @param string $boisson
     *
     * @return Recette
     */
    public function setBoisson($boisson)
    {
        $this->boisson = $boisson;

        return $this;
    }

    /**
     * Get boisson
     *
     * @return string
     */
    public function getBoisson()
    {
        return $this->boisson;
    }

    /**
     * Set categorie
     *
     * @param Categorie $categorie
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
     * @return Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set famille
     *
     * @param Famille $famille
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
     * @return Famille
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set pays
     *
     * @param Pays $pays
     *
     * @return Recette
     */
    public function setPays(Pays $pays = null)
    {
        $this->pays = $pays;

        return $this;
    }
    /**
     * Get pays
     *
     * @return Pays
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add etape
     *
     * @param Etape $etape
     *
     * @return Recette
     */
    public function addEtape(Etape $etape)
    {
        $this->etapes[] = $etape;

        $etape->setRecette($this);

        return $this;
    }

    /**
     * Remove etape
     *
     * @param Etape $etape
     */
    public function removeEtape(Etape $etape)
    {
        $this->etapes->removeElement($etape);
    }

    /**
     * Get etapes
     *
     * @return  Etape[]
     */
    public function getEtapes()
    {
        return $this->etapes;
    }

    /**
     * Set image
     *
     * @param Image $image
     *
     * @return Recette
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add recetteEndroit
     *
     * @param RecetteEndroit $recetteEndroit
     *
     * @return Recette
     */
    public function addRecetteEndroit(RecetteEndroit $recetteEndroit)
    {
        $this->recetteEndroits[] = $recetteEndroit;

        $recetteEndroit->setRecette($this);

        return $this;
    }

    /**
     * Remove recetteEndroit
     *
     * @param RecetteEndroit $recetteEndroit
     */
    public function removeRecetteEndroit(RecetteEndroit $recetteEndroit)
    {
        $this->recetteEndroits->removeElement($recetteEndroit);
    }

    /**
     * Get recetteEndroits
     *
     * @return RecetteEndroit[]
     */
    public function getRecetteEndroits()
    {
        return $this->recetteEndroits;
    }

    /**
     * Add RecetteComposes
     *
     * @param Compose $RecetteComposes
     *
     * @return Recette
     */
    public function addRecetteComposes(Compose $RecetteComposes)
    {
        $this->recetteComposes[] = $RecetteComposes;
        $RecetteComposes->setRecette($this);

        return $this;
    }

    /**
     * Remove RecetteComposes
     *
     * @param Compose $RecetteComposes
     */
    public function removeRecetteComposes(Compose $RecetteComposes)
    {
        $this->recetteComposes->removeElement($RecetteComposes);
    }

    /**
     * Get recetteComposes
     *
     * @return Compose[]
     */
    public function getrecetteComposes()
    {
        return $this->recetteComposes;
    }
}
