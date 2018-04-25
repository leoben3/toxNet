<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 17:16
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\WeatherStationRepository")
 */
class WeatherStation
{

    const AG = 'Agost';
    const AL_PLA = 'Alacant-El Pla';
    const AL_RAB = 'Alacant-Rabassa';
    const AL_FLOR = 'Alacant-Florida Babel';
    const ALC_VER = 'Alcoi-Verge dels Lliris';
    const BEN = 'Benidorm';
    const ELX_AGRO = 'Elx-Agroalimentari';
    const ELX_PARC = 'Elx-Parc de bombers';



    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="province")
     */
    private $province;

    /**
     * @ORM\Column (name="location", type="string", length=100)
     */
    private $location;

    public function __construct()
    {
        $this->province = new ArrayCollection();
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }




}