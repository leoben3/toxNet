<?php


namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use AppBundle\Service\AnnualRegisterService;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\TranslatorInterface;

class AnnualRegisterController extends DefaultController
{

    private $annualRegisterService;
    private $doctrine;
    private $translator;

    public function __construct(
        AnnualRegisterService $annualRegisterService,
        RegistryInterface $doctrine,
        TranslatorInterface $translator
    )
    {
        $this->annualRegisterService = $annualRegisterService;
        $this->doctrine = $doctrine;
        $this->translator = $translator;
    }


    public function getAnnualRegisters()
    {
        $annualRegisters = $this->annualRegisterService->findAll($this->doctrine);
        $response = $this->createApiResponse($annualRegisters, 'secondaryInformationGroup',Response::HTTP_OK);

        return $response;
    }

    public function getAnnualRegister($idPollutant, $idWeatherStation)
    {
        $annualRegisterData = $this->getAnnualRegisterData($idPollutant, $idWeatherStation);

        $responseData = ['data' => ['annualRegister' => $annualRegisterData]];

        return $this->createApiResponse($responseData, 'secondaryInformationGroup',Response::HTTP_OK);
    }

    public function getAnnualRegisterData($idPollutant, $idWeatherStation)
    {
        $annualRegister = $this->annualRegisterService
            ->getAllByPollutantAndWeatherStation($this->doctrine,$idPollutant,$idWeatherStation);

        if(!$annualRegister){

            throw new NotFoundHttpException('Entidad no encontrada');
        }

        return $annualRegister;
    }


}