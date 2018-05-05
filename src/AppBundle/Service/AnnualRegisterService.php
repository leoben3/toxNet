<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 23/04/18
 * Time: 13:25
 */

namespace AppBundle\Service;

use AppBundle\Entity\annualRegister;

class AnnualRegisterService extends BaseService
{
    protected $modelClass = AnnualRegister::class;

    public function getAllByPollutantAndWeatherStation($doctrine,$idPollutant,$weatherStation)
    {
        return $doctrine->getRepository($this->modelClass)->findAllByPollutantAndWeatherStation($idPollutant,$weatherStation);
    }
}