<?php

namespace weservice\webserviceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BritoControllerTest extends WebTestCase
{
    public function testCriar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/criar');
    }

    public function testReceber()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/receber');
    }

    public function testDeletar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletar');
    }

}
