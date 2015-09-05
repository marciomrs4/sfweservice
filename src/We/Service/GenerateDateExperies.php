<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/08/15
 * Time: 17:27
 */

namespace We\Service;


class GenerateDateExperies
{
    public function getDataExpiries()
    {
        $date = new \DateTime('now');
        $date->modify('+1 day');
        $oneDate = $date->format('Y-m-d');
        return $oneDate;
    }

}