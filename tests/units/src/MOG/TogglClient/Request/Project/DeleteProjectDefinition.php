<?php

namespace MOG\TogglClient\Tests\Units\Request\Project;

use atoum;
use MOG\TogglClient\Request\Project\DeleteProjectDefinition as SUT;

class DeleteProjectDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'pid' => 10,
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Project\DeleteProjectDefinition')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'pid' => 10,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('projects/10')
        ;
    }
}
