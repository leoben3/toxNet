<?php


namespace AppBundle\Controller;


class PollutantController extends DefaultController
{


    public function getPollutants()
    {
        $url = $this->generateUrl(
            'pollutants'
        );


    }


    public function getPollutant()
    {
        $url = $this->generateUrl(
            'pollutant_item'
        );


    }


}