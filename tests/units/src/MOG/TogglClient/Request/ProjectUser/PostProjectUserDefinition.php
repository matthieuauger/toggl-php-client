<?php

namespace MOG\TogglClient\Tests\Units\Request\ProjectUser;

use atoum;
use MOG\TogglClient\Request\ProjectUser\PostProjectUserDefinition as SUT;

class PostProjectUserDefinition extends atoum
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
                    'uid' => 2,
                    $optionName => $value
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\ProjectUser\PostProjectUserDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('wid', 10),
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
                    'pid' => 1,
                    'uid' => 2,
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('project_users')
        ;
    }
}
