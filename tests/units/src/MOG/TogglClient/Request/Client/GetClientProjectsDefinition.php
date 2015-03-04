<?php

namespace MOG\TogglClient\Tests\Units\Request\Client;

use atoum;
use MOG\TogglClient\Request\Client\GetClientProjectsDefinition as SUT;

class GetClientProjectsDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array(
                    'cid' => 10,
                    $optionName => $value,
                )
            )
            ->then
                ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Client\GetClientProjectsDefinition')
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

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'cid' => 10,
                    'active' => true,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
                ->string($definition->getUrl())->isIdenticalTo('clients/10/projects?active=true')
        ;
    }
}
