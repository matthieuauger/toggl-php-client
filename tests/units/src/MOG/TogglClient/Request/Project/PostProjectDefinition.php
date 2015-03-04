<?php

namespace MOG\TogglClient\Tests\Units\Request\Project;

use atoum;
use MOG\TogglClient\Request\Project\PostProjectDefinition as SUT;

class PostProjectDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array(
                    'name' => 'Prevent human extinction',
                    'wid' => 1,
                    $optionName => $value
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Project\PostProjectDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('cid', 10),
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
                    'name' => 'Prevent human extinction',
                    'wid' => 1,
                    'is_private' => true,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('projects')
        ;
    }
}
