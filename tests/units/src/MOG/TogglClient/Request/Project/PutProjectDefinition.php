<?php

namespace MOG\TogglClient\Tests\Units\Request\Project;

use atoum;
use MOG\TogglClient\Request\Project\PutProjectDefinition as SUT;

class PutProjectDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array(
                    'pid' => 1,
                    $optionName => $value
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Project\PutProjectDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('name', 'Live on Mars'),
            array('wid', 10),
            array('active', true),
            array('active', false),
            array('is_private', true),
            array('is_private', false),
            array('template', true),
            array('template', false),
            array('template_id', 11),
            array('billable', true),
            array('billable', false),
            array('auto_estimates', true),
            array('auto_estimates', false),
            array('estimated_hours', 12),
            array('color', 13),
            array('rate', 14.0),
        );
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'pid' => 1,
                    'name' => 'Live on Mars',
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('projects/1')
        ;
    }
}
