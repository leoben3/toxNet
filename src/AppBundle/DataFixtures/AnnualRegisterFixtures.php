<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/04/18
 * Time: 16:24
 */

namespace AppBundle\DataFixtures;


use AppBundle\Entity\AnnualRegister;
use AppBundle\Entity\WeatherStation;
use AppBundle\Entity\Pollutant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AnnualRegisterFixtures extends Fixture implements DependentFixtureInterface
{

    const ANNUALREGISTER =[
        [WeatherStation::VAL_ALB, Pollutant::NOx, 65.4, 2016],
        [WeatherStation::VAL_ALB, Pollutant::PM10, 90.4, 2016],
        [WeatherStation::VAL_ALB, Pollutant::PM25, 93.78, 2016],
        [WeatherStation::CAS_GRA, Pollutant::NOx, 12.4, 2016],
        [WeatherStation::CAS_ERM, Pollutant::PB, 10.5, 2016],
        [WeatherStation::VAL_FR, Pollutant::PB, 23.5, 2015],
        [WeatherStation::VAL_FR, Pollutant::PM25, 12.5, 2015],
        [WeatherStation::VAL_FR, Pollutant::NOx, 32.4, 2015],
    ];

    const WEATHER_STATION = 0;
    const POLLUTANT = 1;
    const CONCENTRATION = 2;
    const YEAR = 3;

    public function load(ObjectManager $manager)
    {
        foreach (self::ANNUALREGISTER as $annualRegisterData){

            $objWeatherStation = $manager->getRepository(WeatherStation::class)
                ->findOneBy(['name' =>$annualRegisterData[self::WEATHER_STATION]]);
            $objPollutant = $manager->getRepository(Pollutant::class)
                ->findOneBy(['name' =>$annualRegisterData[self::POLLUTANT]]);

            $annualRegister = new AnnualRegister();
            $annualRegister->setPollutant($objPollutant);
            $annualRegister->setWeatherStation($objWeatherStation);
            $annualRegister->setAnnualMeanConcentration($annualRegisterData[self::CONCENTRATION]);
            $annualRegister->setYear($annualRegisterData[self::YEAR]);
            $manager->persist($annualRegister);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            WeatherStationFixtures::class,
            PollutantFixtures::class
        ];
    }
}