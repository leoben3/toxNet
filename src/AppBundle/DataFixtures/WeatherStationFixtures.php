<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/04/18
 * Time: 16:23
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Province;
use AppBundle\Entity\WeatherStation;

class WeatherStationFixtures
{

const WEATHERSTATION_PROVINCES =[

    Province::AL => [
        WeatherStation::AG,
        WeatherStation::AL_PLA,
        WeatherStation::AL_RAB,
        WeatherStation::AL_FLOR,
        WeatherStation::ALC_VER,
        WeatherStation::BEN,
        WeatherStation::ELX_AGRO,
        WeatherStation::ELX_PARC
    ],

    Province::CAS => [
        WeatherStation::CAS_PEN,
        WeatherStation::CAS_ERM,
        WeatherStation::CAS_GRA,
        WeatherStation::BENIC,
        WeatherStation::BURR,
        WeatherStation::OND,
        WeatherStation::VIL
    ],

    Province::VAL => [
        WeatherStation::VAL_ALB,
        WeatherStation::VAL_SIL,
        WeatherStation::VAL_VIV,
        WeatherStation::VAL_FR,
        WeatherStation::VAL_POL,
        WeatherStation::SAG_NORD,
        WeatherStation::SAG_PORT,
        WeatherStation::GAND,
        WeatherStation::PAT,
        WeatherStation::BURJ,
        WeatherStation::BU,
    ]
];




}