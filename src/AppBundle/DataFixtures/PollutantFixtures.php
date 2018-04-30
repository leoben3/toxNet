<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/04/18
 * Time: 16:22
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Pollutant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PollutantFixtures extends Fixture
{
    const POLLUTANT_DATA =[
        [Pollutant::PM10, Pollutant::PRIM, Pollutant::PM10_MECH, Pollutant::PM10_EFF],
        [Pollutant::PM25, Pollutant::PRIM, Pollutant::PM25_MECH, Pollutant::PM25_EFF],
        [Pollutant::NOx, Pollutant::PRIM, Pollutant::NOx_MECH, Pollutant::NOx_EFF],
        [Pollutant::PB, Pollutant::PRIM, Pollutant::PB_MECH, Pollutant::PB_EFF]
    ];

    const POLLUTANT_NAME = 0;
    const POLLUTANT_TYPE = 1;
    const POLLUTANT_MECH = 2;
    const POLLUTANT_EFF = 3;

    public function load(ObjectManager $manager){

        foreach (self::POLLUTANT_DATA as $pollutants){

            $pollutant = new Pollutant();

            $obj = $manager->getRepository(Pollutant::class)
                ->findOneBy(['name' =>$pollutants[self::POLLUTANT_NAME]]);

            if(!$obj){
                $pollutant->setName($pollutants[self::POLLUTANT_NAME]);
                $pollutant->setType($pollutants[self::POLLUTANT_TYPE]);
                $pollutant->setMechanismAction($pollutants[self::POLLUTANT_MECH]);
                $pollutant->setEffects($pollutants[self::POLLUTANT_EFF]);
                $manager->persist($pollutant);
            }
        }
        $manager->flush();

    }

}