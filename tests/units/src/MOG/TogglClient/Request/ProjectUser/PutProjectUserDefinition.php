<?php

namespace MOG\TogglClient\Tests\Units\Request\ProjectUser;

use atoum;
use MOG\TogglClient\Request\ProjectUser\PutProjectUserDefinition as SUT;

class PutProjectUserDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array(
                    'puid' => 1,
                    $optionName => $value
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\ProjectUser\PutProjectUserDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('manager', true),
            array('manager', false),
            array('rate', 11.1),
        );
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'puid' => 1,
                    'manager' => false,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('project_users/1')
        ;
    }
}
