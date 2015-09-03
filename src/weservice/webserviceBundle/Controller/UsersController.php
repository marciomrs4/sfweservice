<?php

namespace weservice\webserviceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends FOSRestController
{

    public function usersAction()
    {

        $json = array(
            array('nome'=>'Marcio Ramos','idade'=>'33'),
            array('nome'=>'Marcio','idade'=>'23'),
            array('nome'=>'Thais','idade'=>'25'),
            array('nome'=>'Miuda','idade'=>'12'),
            array('nome'=>'Miudesas','idade'=>'10'),
            array('nome'=>'PHP','idade'=>'Symfony2'));

        return new JsonResponse($json);
    }


    public function getJsonAction($url)
    {
        return new Response(json_decode($url));
    }

}
