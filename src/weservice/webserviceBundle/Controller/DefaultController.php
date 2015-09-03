<?php

namespace weservice\webserviceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('weservicewebserviceBundle:Default:index.html.twig', array('name' => $name));
    }

    public function jsonAction()
    {
        $array = array(
                    array('nome'=>'Márcio','idade'=>'33'),
                    array('nome'=>'Marcio Ramos','idade'=>'33'),
                    array('nome'=>'Marcio','idade'=>'23'),
                    array('nome'=>'Thais','idade'=>'25'),
                    array('nome'=>'Miuda','idade'=>'12'),
                    array('nome'=>'Miudesas','idade'=>'10'),
                    array('nome'=>'Marcio Ramos','idade'=>'33'),
                    array('nome'=>'Marcio','idade'=>'23'),
                    array('nome'=>'Thais','idade'=>'25'),
                    array('nome'=>'Miuda','idade'=>'12'),
                    array('nome'=>'Miudesas','idade'=>'10'));

        $array = json_encode($array);

        $reponse = new Response();

        $reponse->setContent($array)->headers->set('Content-Type','application/json');

        return $reponse;
    }

    public function receiverFormAction(Request $request)
    {

        if($request->getMethod() == 'POST') {
            //nomeUsuario | email | ramal

           $posts = array();
           $posts[] = array('nome' => strtoupper($request->get('nomeUsuario')),
                            'email'=> strrev($request->get('email')),
                            'ramal' => strtolower($request->get('ramal')) );

/*            $array = json_encode($posts);

            $response  = new Response();
            $response->setContent($array)->headers->set('Content-Type', 'application/json');

            return $response;*/

            $response = new JsonResponse();
            $response->setData($posts);
            return $response;

            //return $this->jsonAction();
            //return $this->render('weservicewebserviceBundle:Default:post.html.twig',array('post'=>$post));
        }
        return new Response($request->getClientIps() .' - ',401);
    }

    public function authAction(Request $request)
    {
        $data = 'marcio foi zica, mas symfony tem sido treta de mais';

        $response = new Response();

        //$token = $request->headers->get('Token-we');
        $token = $request->headers->get('auth');

        if(($token) and ($token == 'A')) {
            $token = 'Peguei o Token e manipulei ' . $token;

            $response->headers->set('Authorization', "Bearer: {$data}");
            $response->headers->set('auth-toke', 'manolovctaautorizadoporqvcezica');
            $response->headers->set('X-Powered-By', 'eu mesmo e dai');
            // $response->headers->setCookie(new Cookie('teste',$request->headers));

            $response->setContent('Devolvendo o Token: ' . $token);

            return $response;
        }else{
            return new Response('Não Authorizado');
        }
    }

    public function getHeaderAction(Request $request)
    {
        return $this->authAction($request);

        //return new Response("<pre> </pre>");
    }



}
