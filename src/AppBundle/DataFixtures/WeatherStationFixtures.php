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
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class WeatherStationFixtures extends Fixture implements DependentFixtureInterface
{
    const PROVINCES =[
        Province::AL,
        Province::CAS,
        Province::VAL
    ];

    const WEATHERSTATION_BY_PROVINCES =[

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

    public function load(ObjectManager $manager)
    {
        foreach (self::PROVINCES as $provinces){

            foreach (self::WEATHERSTATION_BY_PROVINCES[$provinces] as $wea){

                $obj = $manager->getRepository(WeatherStation::class)->findOneBy(['name' =>$wea]);
                $objProvince = $manager->getRepository(Province::class)->findOneBy(['name' =>$provinces]);

                if(!$obj){
                    $weatherStation= new WeatherStation();
                    $weatherStation->setName($wea);
                    $weatherStation->setProvince($objProvince);
                    $manager->persist($weatherStation);
                }
            }
            $manager->flush();
        }

    }

    public function getDependencies()
    {
       return [
           ProvinceFixtures::class,
       ];
    }


}