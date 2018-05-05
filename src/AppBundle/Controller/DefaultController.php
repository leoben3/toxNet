<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends FOSRestController
{

    private $serializer;

    private $normalizers;

    private $encoders;

    public function __construct()
    {
        $this->normalizers = array(new ObjectNormalizer());
        $this->encoders = array(new JsonEncoder());
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
    }

    protected function createApiResponse($data, $statusCode = Response::HTTP_OK, $serialization_group = null)
    {
//        $json = $this->serialize($data, $serialization_group);

        return new Response('json', $statusCode, [
            'Content-Type' => 'application/json',
        ]);

    }

//    protected function serialize($data, $serialization_group = null,  $format='json')
//    {
//
//        $this->serializer->serialize($data, $format);
//
//
//
//    }






}
