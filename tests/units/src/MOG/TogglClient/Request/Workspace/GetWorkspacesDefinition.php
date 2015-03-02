<?php

namespace MOG\TogglClient\Tests\Units\Request\Workspace;

use atoum;
use MOG\TogglClient\Request\Workspace\GetWorkspacesDefinition as SUT;

class GetWorkspacesDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given()
            ->then
                ->object(new SUT())->isInstanceOf('MOG\TogglClient\Request\Workspace\GetWorkspacesDefinition')
        ;
    }

    public function testUrl()
    {
        $this
            ->given($definition = new SUT())
            ->then
                ->string($definition->getUrl())->isIdenticalTo('workspaces')
        ;
    }
}
