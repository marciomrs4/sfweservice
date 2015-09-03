<?php

namespace WeLoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    public function indexAction()
    {
        
        $page = 'Login';
        return $this->render('@WeLogin/Default/index.html.twig',array('page' => $page));
    }
}
