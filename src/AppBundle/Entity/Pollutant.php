<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 17/04/2018
 * Time: 16:35
 */


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PollutantRepository")
 */
class Pollutant
{
    const PM10 = 'Material Particulado de 10 micras';
    const PM25 = 'Material Particulado de 2.5 micras';
    const NOx = 'Óxidos de nitrógeno';
    const PB = 'Plomo';

    const PRIM = 'Contaminante Primario';
    const SEC = 'Contaminante Secundario';

    const PM10_MECH = 'Inflamación de las vías aéreas y estrés oxidativo';
    const PM25_MECH ='Inflamación de las vías aéreas y estrés oxidativo';
    const NOx_MECH ='Inhibición irreversible de enzimas dependientes del zinc';
    const PB_MECH = 'Neurotóxico';

    const PM10_EFF = 'Lesiones en las vías respiratorias y en los pulmones. Reducción de la capacidad pulmonar y una
    mayor sensibilidad a los alérgenos. Con exposiciones prolongadas se han observado cambios irreversibles en la
    estructura y función de los pulmones';
    const PM25_EFF = 'Más peligrosas que las de 10 micras. Su menor tamaño les permite adentrarse en el aparato respiratorio
    y depositarse en los alveolos pulmonares e incluso llegar al torrente sanguíneo. Producen enfermedades respiratorias
    como bronquitis, dolencias de tipo cardiovascular, asmas y alergias';
    const NOx_EFF = 'Bronquitis en niños asmáticos y disminución del desarrollo de la función pulmonar';
    const PB_EFF = 'Se deposita en el esqueleto. Produce saturnismo que incluye, entre otros efectos, anemia, diarrea,
    nauseas, sabor metálico y dulzón, irritabilidad y dolores musculares.';


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue;
     */
    private $id;
    /**
     * @Groups({"primaryInformationGroup"})
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
     * @Groups({"primaryInformationGroup"})
     * @ORM\Column(name="effects", type="text")
     */
    private $effects;

    private $classMetadataFactory;


    public function __construct($classMetadataFactory)
    {
        $this->classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
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