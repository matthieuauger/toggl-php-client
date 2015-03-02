<?php

namespace MOG\TogglClient\Tests\Units\Request\Workspace;

use atoum;
use MOG\TogglClient\Request\Workspace\GetWorkspaceProjectsDefinition as SUT;

class GetWorkspaceProjectsDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array(
                    'wid' => 10,
                    $optionName => $value,
                )
            )
            ->then
                ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Workspace\GetWorkspaceProjectsDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('active', true),
            array('active', false),
            array('active', 'both'),
            array('actual_hours', true),
            array('actual_hours', false),
            array('only_templates', true),
            array('only_templates', false),
        );
    }

    public function testUnknownOptions()
    {
        $this
            ->given(
                $options = array(
                    'wid' => 10,
                    'unknown_option' => true,
                )
            )
            ->then
                ->exception(
                    function() use($options) {
                        new SUT($options);
                    }
                )
                ->isInstanceOf('Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'wid' => 10,
                    'active' => true,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
                ->string($definition->getUrl())->isIdenticalTo('workspaces/10/projects?active=true')
        ;
    }
}
