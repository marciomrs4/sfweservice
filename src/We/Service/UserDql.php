<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/08/15
 * Time: 17:27
 */

namespace We\Service;


class UserDql
{
    public function getUserDql()
    {
        $userauth = rand(1,1000);
        return ['user-auth'=>$userauth,'experies'=>new \DateTime('now')];
    }

}