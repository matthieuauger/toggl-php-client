<?php

namespace MOG\TogglClient\Tests\Units\Request\Client;

use atoum;
use MOG\TogglClient\Request\Client\PostClientDefinition as SUT;

class PostClientDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array(
                    'name' => 'Ozymandias',
                    'wid' => 1,
                    $optionName => $value
                )
            )
            ->then
            ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\Client\PostClientDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        return array(
            array('notes', 'Smartest man of the earth'),
            array('hrate', 10.0),
            array('cur', '€'),
            array('at', 1425414111),
        );
    }

    public function testUrl()
    {
        $this
            ->given(
                $options = array(
                    'name' => 'Ozymandias',
                    'wid' => 1,
                    'notes' => 'Smartest man of the earth',
                )
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
            ->string($definition->getUrl())->isIdenticalTo('clients')
        ;
    }
}
