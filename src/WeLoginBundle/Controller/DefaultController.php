<?php

namespace WeLoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WeLoginBundle\Entity\Login;


class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {

        //$login = new Login();

        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('we_login_post'))
            ->add('nome','text')
            ->add('senha','password')
            ->add('save','submit',array('label'=>'Enviar'))
            ->getForm();

        if($request->isMethod('POST')){

            $form->handleRequest($request);
            return $this->redirectToRoute('we_login_post');
        }


        return $this->render('WeLoginBundle:Default:index.html.twig',
            array(
                'action' => $this->generateUrl('we_login_post'),
                'form' => $form->createView()));

    }

    public function postAction(Request $request)
    {

        $message = 'Cadastrou';

        return $this->render('@WeLogin/Default/post.html.twig',
            array('message'=>$message,
                  'request'=>$request->get('form')));
    }
}
