<?php

namespace MOG\TogglClient\Tests\Units\Request\Project;

use atoum;
use MOG\TogglClient\Request\Project\DeleteProjectsDefinition as SUT;

class DeleteProjectsDefinition extends atoum
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'pids' => array(1, 2, 3),
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Project\DeleteProjectsDefinition')
        ;
    }

    public function testNotIntegerPids()
    {
        $this
            ->given(
                $options = array(
                    'pids' => array(1, "deux", 3),
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

    public function testEmptyPids()
    {
        $this
            ->given(
                $options = array(
                    'pids' => array(),
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
                    'pids' => array(1, 2, 3),
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('projects/1,2,3')
        ;
    }
}
