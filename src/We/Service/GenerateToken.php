<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/08/15
 * Time: 17:27
 */

namespace We\Service;


class GenerateToken
{
    public function generateNewToken()
    {
        $token = sha1(date('Y-m-d'));
        return $token;
    }

}