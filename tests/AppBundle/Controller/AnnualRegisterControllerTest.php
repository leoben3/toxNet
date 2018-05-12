<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AnnualRegisterControllerTest extends WebTestCase
{
    private $client;
    private $container;
    private $router;

    const WEATHER_STATION_EXISTING_ID = 16;
    const POLLUTANT_EXISTING_ID = 3;
    const POLLUTANT_NOT_EXISTING_ID = 50;

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

    public function testGetAnnualRegisterReturns200WhenBothParametersAreOk()
    {
        $url = $this->router->generate('register_item', ['idPollutant' => self::POLLUTANT_EXISTING_ID,
            'idWeatherStation' => self::WEATHER_STATION_EXISTING_ID]);

        $this->client->request('GET', $url);

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    }

    public function testGetAnnualRegisterReturns404WhenBothParametersAreNotOk()
    {
        $url = $this->router->generate('register_item', ['idPollutant' => self::WEATHER_STATION_EXISTING_ID,
            'idWeatherStation' => self::POLLUTANT_NOT_EXISTING_ID]);
        $this->client->request('GET', $url);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
    }


}
