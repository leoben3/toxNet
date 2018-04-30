<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 16:35
 */


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PollutantRepository")
 */
class Pollutant
{
    const PM10 = 'Material particulado de 10 micras';
    const PM25 = 'Material particulado de 2.5 micras';
    const NO2 = 'Dióxido de nitrógeno';
    


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;
    /**
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(name="type", type="string", length=32)
     */
    private $type;

    /**
     * @ORM\Column(name="mechanism_action", type="string", length=255)
     */
    private $mechanismAction;

    /**
     * @ORM\Column(name="effects", type="text")
     */
    private $effects;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMechanismAction()
    {
        return $this->mechanismAction;
    }

    /**
     * @param mixed $mechanismAction
     */
    public function setMechanismAction($mechanismAction)
    {
        $this->mechanismAction = $mechanismAction;
    }

    /**
     * @return mixed
     */
    public function getEffects()
    {
        return $this->effects;
    }

    /**
     * @param mixed $effects
     */
    public function setEffects($effects)
    {
        $this->effects = $effects;
    }





}