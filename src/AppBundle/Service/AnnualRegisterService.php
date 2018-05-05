<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 23/04/18
 * Time: 13:25
 */

namespace AppBundle\Service;

use AppBundle\Entity\AnnualRegister;

class AnnualRegisterService extends BaseService
{
    protected $modelClass = AnnualRegister::class;

    public function getAllByPollutantAndWeatherStation($doctrine,$idPollutant,$idWeatherStation)
    {
        return $doctrine->getRepository($this->modelClass)->getAllByPollutantAndWeatherStation($idPollutant,$idWeatherStation);
    }
}