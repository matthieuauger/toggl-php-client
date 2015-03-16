<?php

namespace MOG\TogglClient\Tests\Units\Request\ProjectUser;

use atoum;
use MOG\TogglClient\Request\ProjectUser\DeleteProjectUsersDefinition as SUT;

class DeleteProjectUsersDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'puids' => array(1, 2, 3),
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\ProjectUser\DeleteProjectUsersDefinition')
        ;
    }

    public function testNotIntegerpuids()
    {
        $this
            ->given(
                $options = array(
                    'puids' => array(1, "deux", 3),
                )
            )
            ->then
            ->exception(
                function() use($options) {
                    new SUT($options);
                }
            )
            ->isInstanceOf('Symfony\Component\OptionsResolver\Exception\InvalidOptionsException')
        ;
    }

    public function testEmptypuids()
    {
        $this
            ->given(
                $options = array(
                    'puids' => array(),
                )
            )
            ->then
            ->exception(
                function() use($options) {
                    new SUT($options);
                }
            )
            ->isInstanceOf('Symfony\Component\OptionsResolver\Exception\InvalidOptionsException')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'puids' => array(1, 2, 3),
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('project_users/1,2,3')
        ;
    }
}
