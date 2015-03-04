<?php

namespace MOG\TogglClient\Tests\Units\Request\Client;

use atoum;
use MOG\TogglClient\Request\Client\DeleteClientDefinition as SUT;

class DeleteClientDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'cid' => 10,
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Client\DeleteClientDefinition')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'cid' => 10,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('clients/10')
        ;
    }
}
