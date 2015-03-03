<?php

namespace MOG\TogglClient\Tests\Units\Request\Workspace;

use atoum;
use MOG\TogglClient\Request\Workspace\GetWorkspaceClientsDefinition as SUT;

class GetWorkspaceClientsDefinition extends atoum
{
    public function testConstructor()
    {
        $this
            ->given(
                $options = array(
                    'wid' => 10,
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Workspace\GetWorkspaceClientsDefinition')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'wid' => 10,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('workspaces/10/clients')
        ;
    }
}
