<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/04/18
 * Time: 16:23
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Province;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProvinceFixtures extends Fixture
{

    const PROVINCE_NAMES= [

        Province::AL,
        Province::CAS,
        Province::VAL

    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROVINCE_NAMES as $provinces){

            $obj = $manager->getRepository(Province::class)->findOneBy(['name' =>$provinces]);
            if(!$obj){
                $province = new Province();
                $province->setName($provinces);
                $manager->persist($province);
            }
        }
        $manager->flush();
    }


}