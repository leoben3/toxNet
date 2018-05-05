<?php


namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Response;
use AppBundle\Service\AnnualRegisterService;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AnnualRegisterController extends DefaultController
{

    private $annualRegisterService;
    private $doctrine;


    public function __construct(AnnualRegisterService $annualRegisterService, RegistryInterface $doctrine)
    {
        $this->annualRegisterService = $annualRegisterService;
        $this->doctrine = $doctrine;

    }


    public function getAnnualRegisters()
    {



        $this->createApiResponse($data, Response::HTTP_OK);

    }


    public function getAnnualRegister()
    {

    }


}