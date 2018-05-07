<?php


namespace AppBundle\Controller;


use AppBundle\Service\PollutantService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\TranslatorInterface;


class PollutantController extends DefaultController
{

    private $pollutantService;
    private $doctrine;
    private $translator;

    public function __construct(
        PollutantService $pollutantService,
        RegistryInterface $doctrine,
        TranslatorInterface $translator
    )
    {
        $this->pollutantService = $pollutantService;
        $this->doctrine = $doctrine;
        $this->translator = $translator;
    }

    public function getPollutants()
    {
        $pollutants = $this->pollutantService->findAll($this->doctrine);

        $response = $this->createApiResponse($pollutants, Response::HTTP_OK);

        return $response;
    }

    public function getPollutant($name)
    {
        $pollutantData = $this->getPollutantData($name);

        $responseData = ['data' => ['pollutant' => $pollutantData]];

        return $this->createApiResponse($responseData, Response::HTTP_OK);
    }

    public function getPollutantData($name)
    {
        $pollutant = $this->pollutantService->findOneByName($this->doctrine, $name);
        if(!$pollutant){

            throw new NotFoundHttpException('Entidad no encontrada');
        }
        return $pollutant;
    }


}