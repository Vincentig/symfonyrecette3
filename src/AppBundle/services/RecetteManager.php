<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 04/08/2016
 * Time: 21:29
 */

namespace AppBundle\services;

use AppBundle\Repository\RecetteRepository;

/**
 * Class RecetteManager
 * @package AppBundle\services
 */
class RecetteManager
{
    /**
     * @var RecetteRepository
     */
    protected $repo;

    /**
     * RecetteManager constructor.
     *
     * @param RecetteRepository $repo
     */
    public function __construct(RecetteRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $famille
     * @param $categorie
     * @return int
     */
    public function getLastNumberWithFamilyAndCategory($famille, $categorie)
    {
        $newNumber = 1;
        $lastNumberInDataBase = $this->repo->findLastNumberWithFamilyAndCategory($famille, $categorie);
        ld($lastNumberInDataBase);
        if(count($lastNumberInDataBase) > 0) {
            $newNumber = $lastNumberInDataBase[0]['numero'] + 1;
        }
        return $newNumber;
    }

}