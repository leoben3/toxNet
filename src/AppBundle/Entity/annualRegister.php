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

/**
 * @ORM\Entity(repositoryClass="App\Repository\annualRegisterRepository")
 */
class annualRegister
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="weatherStation")
     */
    private $weatherStation;

    /**
     * @ORM\ManyToOne(targetEntity="pollutant")
     */
    private $pollutant;

    /**
     * @ORM\Column(name="annual_mean_concentration", type="decimal", precision=4, scale=2)
     */
    private $annualMeanConcentration;

    /**
     * @ORM\Column(name="year", type="integer")
     */
    private $year;


    public function __construct()
    {
        $this->weatherStation = new ArrayCollection();
        $this->pollutant = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getWeatherStation()
    {
        return $this->weatherStation;
    }

    /**
     * @param mixed $weatherStation
     */
    public function setWeatherStation($weatherStation)
    {
        $this->weatherStation = $weatherStation;
    }

    /**
     * @return mixed
     */
    public function getPollutant()
    {
        return $this->pollutant;
    }

    /**
     * @param mixed $pollutant
     */
    public function setPollutant($pollutant)
    {
        $this->pollutant = $pollutant;
    }

    /**
     * @return mixed
     */
    public function getAnnualMeanConcentration()
    {
        return $this->annualMeanConcentration;
    }

    /**
     * @param mixed $annualMeanConcentration
     */
    public function setAnnualMeanConcentration($annualMeanConcentration)
    {
        $this->annualMeanConcentration = $annualMeanConcentration;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }








}