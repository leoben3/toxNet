<?php

namespace tests\AppBundle\Repository;

use AppBundle\Entity\AnnualRegister;
use AppBundle\Entity\Pollutant;
use AppBundle\Entity\WeatherStation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class AnnualRegisterRepositoryTest extends KernelTestCase
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    /**
     * @ Pollutant
     */
    private $objPollutant;

    private $objWeatherStation;


    protected function setUp()
    {
        parent::setUp();

        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }

    public function testFindAllAnnualRegisterByPollutantAndWeatherStationWhenExists()
    {
        $this->createAnnualRegisterAndAssociatedObjects();

        $annualRepository = $this->em->getRepository(AnnualRegister::class)
            ->getAllByPollutantAndWeatherStation($this->objPollutant->getId(),$this->objWeatherStation->getId());

        $this->assertEquals(28.45, $annualRepository[0]->getAnnualMeanConcentration());
    }

    public function createAnnualRegisterAndAssociatedObjects()
    {
        $this->objPollutant = $this->em->getRepository(Pollutant::class)
            ->findOneBy(['name' =>Pollutant::PM10]);

        $this->objWeatherStation = $this->em->getRepository(WeatherStation::class)
            ->findOneBy(['name' =>WeatherStation::VAL_FR]);

        $annualRegister = new AnnualRegister();
        $annualRegister->setYear(2016);
        $annualRegister->setAnnualMeanConcentration(28.45);
        $annualRegister->setPollutant($this->objPollutant);
        $annualRegister->setWeatherStation($this->objWeatherStation);

        $this->em->persist($annualRegister);
        $this->em->flush();

    }

}