<?php

namespace We\ServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/1.0/hello/{name}", name="we_homepage").
     * @Template("WeServiceBundle:Default:index.html.twig", vars={"array"})
     */
    public function indexAction($name)
    {
        $data = $this->getDoctrine()->getRepository('weservicewebserviceBundle:UserWeb','site')->findAll();
        //->getEntityManager('site')->getRepository('weservicewebserviceBundle:UserWeb')->findAll();
        //$data = $this->get('doctrine')->getRepository('weservicewebserviceBundle:UserWeb','site2')->findAll();


        $array = array('data');
        foreach($data as $obj){
            $array[] = $obj->getId().$obj->getNome().hash('sha512',$obj->getSenha());
        }

        return array('name' => $array);
        //return $this->render('WeServiceBundle:Default:index.html.twig', array('name' => $array));
    }

    public function getUserDqlAction(Request $request)
    {
        $dados = $request->headers;



/*        $parameters = new ParameterBag();

        $dados = $parameters->all();

        $array = $this->get('user.dql')->getUserDql();*/

        return new JsonResponse($dados);
    }

}
