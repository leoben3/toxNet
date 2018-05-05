<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 05/05/2018
 * Time: 15:20
 */

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ManagerRegistry;

class BaseService
{
    /**
     * @var string
     */
    protected $modelClass;

    public function __construct()
    {
    }

    /**
     * @param string $modelClass
     */
    public function setModelClass($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function findAll(ManagerRegistry $doctrine)
    {
        if (!$this->modelClass) {
            return [];
        }

        return $doctrine->getRepository($this->modelClass)->findAll();
    }

    public function findOne(ManagerRegistry $doctrine, $id)
    {
        if (!$this->modelClass) {
            return null;
        }

        return $doctrine->getRepository($this->modelClass)->find($id);
    }

    public function findOneByCode($doctrine, $code)
    {
        if (!$this->modelClass) {
            return null;
        }

        return $doctrine->getRepository($this->modelClass)->findOneByCode($code);
    }

    public function doFlush($doctrine)
    {
        $doctrine->getManager()->flush();
    }

    public function doClear($doctrine)
    {
        $doctrine->getManager()->clear();
    }

}