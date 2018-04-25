<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 23/04/18
 * Time: 13:13
 */

namespace AppBundle\Service;

use AppBundle\Entity\pollutant;

class PollutantService
{

    protected $modelClass = pollutant::class;

    public function findOneByName($doctrine, $name)
    {
        $repository = $doctrine->getRepository($this->modelClass);

        return $repository->findOneBy(['name' => $name]);
    }

}