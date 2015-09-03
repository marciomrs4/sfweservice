<?php

namespace weservice\webserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BritoController extends Controller
{
    public function criarAction()
    {
        $array = array('nome'=>'Brito','framework'=>'Symfony2');
        return new JsonResponse($array);
    }

    public function receberAction()
    {
        $array = array('nome'=>'Brito','framework'=>'Symfony2');
        return new JsonResponse($array);
    }

    public function deletarAction()
    {
        return $this->render('weservicewebserviceBundle:Brito:deletar.html.twig', array(
                // ...
            ));
    }

    public function authUserAction()
    {
        $teste = 'teste';

        $array = $this->get('we.service.authuser')->authUser($teste);

        return new JsonResponse($array);
        //return new Response()
    }

}
