<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 23/04/18
 * Time: 13:13
 */

namespace AppBundle\Service;

use AppBundle\Entity\Pollutant;

class PollutantService extends BaseService
{
    protected $modelClass = Pollutant::class;

    public function findOneByName($doctrine, $name)
    {
        $repository = $doctrine->getRepository($this->modelClass);

        return $repository->findOneBy(['name' => $name]);
    }

}