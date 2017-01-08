<?php

namespace AppBundle\Entity;

use AppBundle\Model\AbstractCategorise;
use Doctrine\ORM\Mapping as ORM;

/**
 * Famille
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FamilleRepository")
 */
class Famille extends AbstractCategorise
{
}

