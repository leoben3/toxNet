<?php


namespace AppBundle\Controller;


class AnnualRegisterController extends DefaultController
{

    public function getAnnualRegisters()
    {
        $url = $this->generateUrl(
            'registers'
        );


    }


    public function getAnnualRegister()
    {
        $url = $this->generateUrl(
            'register_item'
        );

    }


}