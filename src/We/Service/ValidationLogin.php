<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/08/15
 * Time: 17:27
 */

namespace We\Service;


use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ValidationLogin extends Controller
{
    public function getValidationLogin(Request $request)
    {
        if(('' == $request->get('name')) || ('' == $request->get('password')) ){

            return array(
                        array('geterror'=>'usuário ou senha não informado'));

        }else{

            $getToken = new GenerateToken();
            $getDate = new GenerateDateExperies();

            $token = $getToken->generateNewToken();//$this->get('generate.token')->generateNewToken();
            $dataExperies = $getDate->getDataExpiries();//$this->get('date.expiries')->getDataExpiries();

            return array(
                        array('nome'=>$request->get('name'),
                            'senha'=>$request->get('password'),
                            'wetoken'=>$token,
                            'dataExperies'=>$dataExperies,
                            'geterror'=>'not errors foud'));
        }


    }

}