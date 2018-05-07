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
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WeatherStationRepository")
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
    const CAS_PEN = 'Castelló-Penyeta';
    const CAS_ERM = 'Castelló-Ermita';
    const CAS_GRA = 'Castelló-Grau';
    const BENIC = 'Benicássim';
    const BURR = 'Burriana';
    const OND = 'Onda';
    const VIL ='Vila-Real PM';
    const BURJ ='Burjassot-Facultats';
    const GAND = 'Gandia';
    const BU = 'Buñol';
    const SAG_PORT = 'Sagunt-Port';
    const SAG_NORD = 'Sagunt-Nord';
    const PAT = 'Paterna-CEAM';
    const VAL_ALB = 'Valencia-Albufera';
    const VAL_VIV = 'Valencia-Vivers';
    const VAL_SIL = 'Valencia-Pista de Silla';
    const VAL_POL = 'Valencia-Politècnic';
    const VAL_FR = 'Valencia-Avd.Francia';


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     * @Groups({"primaryInformationGroup","secondaryInformationGroup"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Province")
     * @Groups({"primaryInformationGroup","secondaryInformationGroup"})
     */
    private $province;


    public function __construct()
    {
        $this->province = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }




}