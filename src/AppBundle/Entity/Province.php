<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 16:44
 */



namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvinceRepository")
 */
class Province
{
    const AL = 'Alicante';
    const CAS= 'Castellón';
    const VAL= 'Valencia';


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     * @Groups({"primaryInformationGroup"})
     */
    private $name;

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



}