<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;


class DefaultController extends FOSRestController
{

    private $serializer;

    private $normalizers;

    private $encoders;

    private $metadata;

    protected function loadSerializer()
    {
        $this->metadata = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $this->normalizers = array(new ObjectNormalizer($this->metadata));
        $this->encoders = array(new JsonEncoder());
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
    }

    protected function createApiResponse($data, $serialization_group, $statusCode = Response::HTTP_OK)
    {

        $this->loadSerializer();

        $arrayToEncode = $this->normalize($data, $serialization_group);
        $json = $this->serialize($arrayToEncode,'json');

        return new Response($json, $statusCode, [
            'Content-Type' => 'application/json',
        ]);

    }

    protected function serialize($data, $format)
    {
        return $this->serializer->serialize($data, $format);
    }

    protected function normalize($dataArray,$serializationGroup){

        $dataToNormalize = $dataArray;
        $data = $this->serializer->normalize($dataToNormalize,null,array('enable_max_depth' => true,
            'groups'=>[$serializationGroup]));

        return $data;
    }



}
