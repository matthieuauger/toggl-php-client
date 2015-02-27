<?php

namespace MOG\TogglClient\Tests\Units\Request;

use atoum;
use MOG\TogglClient\Request\GetWorkspaceProjectsDefinition as SUT;

class GetWorkspaceProjectsDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $workspaceId = 10,
                $options = array($optionName => $value)
            )
            ->then
                ->object(new SUT($workspaceId, $options))->isInstanceOf('MOG\TogglClient\Request\GetWorkspaceProjectsDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('active', 'true'),
            array('active', 'false'),
            array('active', 'both'),
            array('actual_hours', 'true'),
            array('actual_hours', 'false'),
            array('only_templates', 'true'),
            array('only_templates', 'false'),
        );
    }

    public function testUnknownOptions()
    {
        $this
            ->given(
                $workspaceId = 10,
                $options = array('unknown_option' => true)
            )
            ->then
                ->exception(
                    function() use($workspaceId, $options) {
                        new SUT($workspaceId, $options);
                    }
                )
                ->isInstanceOf('Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException')
        ;
    }

    public function testUrl()
    {
        $this
            ->given(
                $workspaceId = 10,
                $options = array('active' => 'true')
            )
            ->and(
                $definition = new SUT($workspaceId, $options)
            )
            ->then
                ->string($definition->getUrl())->isIdenticalTo('workspaces/10/projects?active=true')
        ;
    }
}
