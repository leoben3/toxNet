<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 17:54
 */


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnualRegisterRepository")
 */
class AnnualRegister
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WeatherStation")
     * @Groups({"primaryInformationGroup"})
     * @MaxDepth(2)
     */
    private $weatherStation;

    /**
     * @ORM\ManyToOne(targetEntity="Pollutant")
     * @Groups({"primaryInformationGroup"})
     * @MaxDepth(2)
     */
    private $pollutant;

    /**
     * @ORM\Column(name="annual_mean_concentration", type="decimal", precision=4, scale=2)
     * @Groups({"primaryInformationGroup"})
     */
    private $annualMeanConcentration;

    /**
     * @ORM\Column(name="year", type="integer")
     * @Groups({"primaryInformationGroup"})
     */
    private $year;


    public function __construct()
    {
        $this->weatherStation = new ArrayCollection();
        $this->pollutant = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return WeatherStation
     */
    public function getWeatherStation()
    {
        return $this->weatherStation;
    }

    /**
     * @param WeatherStation $weatherStation
     */
    public function setWeatherStation($weatherStation)
    {
        $this->weatherStation = $weatherStation;
    }

    /**
     * @return Pollutant
     */
    public function getPollutant()
    {
        return $this->pollutant;
    }

    /**
     * @param Pollutant $pollutant
     */
    public function setPollutant($pollutant)
    {
        $this->pollutant = $pollutant;
    }

    /**
     * @return float
     */
    public function getAnnualMeanConcentration()
    {
        return $this->annualMeanConcentration;
    }

    /**
     * @param float $annualMeanConcentration
     */
    public function setAnnualMeanConcentration($annualMeanConcentration)
    {
        $this->annualMeanConcentration = $annualMeanConcentration;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }








}