<?php

namespace MOG\TogglClient\Tests\Units\Request\Client;

use atoum;
use MOG\TogglClient\Request\Client\GetClientsDefinition as SUT;

class GetClientsDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given()
            ->then
                ->object(new SUT())->isInstanceOf('MOG\TogglClient\Request\Client\GetClientsDefinition')
        ;
    }

    public function testUrl()
    {
        $this
            ->given($definition = new SUT())
            ->then
                ->string($definition->getUrl())->isIdenticalTo('clients')
        ;
    }
}
