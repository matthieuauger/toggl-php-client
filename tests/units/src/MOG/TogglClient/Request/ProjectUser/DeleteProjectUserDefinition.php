<?php

namespace MOG\TogglClient\Tests\Units\Request\ProjectUser;

use atoum;
use MOG\TogglClient\Request\ProjectUser\DeleteProjectUserDefinition as SUT;

class DeleteProjectUserDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'puid' => 10,
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\ProjectUser\DeleteProjectUserDefinition')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'puid' => 10,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('project_users/10')
        ;
    }
}
