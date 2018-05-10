<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PollutantControllerTest extends WebTestCase
{
    private $client;
    private $container;
    private $router;

    const POLLUTANT_EXISTING_NAME = 'Plomo';
    const POLLUTANT_NOT_EXISTING_NAME = 'Nombre-No-Existente';

    protected function setUp()
    {
        parent::setUp();

        $this->client = $this->createClient();
        $this->container = $this->client->getKernel()->getContainer();
        $this->router = $this->container->get('router');

    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->client = null;
        $this->container = null;
        $this->router = null;
    }

    public function testGetPollutantReturns200WhenParameterIsOk()
    {
        $url = $this->router->generate('pollutant_item', ['name' => self:: POLLUTANT_EXISTING_NAME]);
        $this->client->request('GET', $url);

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    }

    public function testGetPollutantReturns404WhenParameterIsNotOk()
    {
        $url = $this->router->generate('pollutant_item', ['name' => self::POLLUTANT_NOT_EXISTING_NAME]);
        $this->client->request('GET', $url);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }



}