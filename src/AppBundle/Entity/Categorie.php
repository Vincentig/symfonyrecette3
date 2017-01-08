<?php

namespace AppBundle\Entity;

use AppBundle\Model\AbstractCategorise;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie extends AbstractCategorise
{

}

