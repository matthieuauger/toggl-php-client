<?php

namespace MOG\TogglClient\Tests\Units\Request;

use atoum;
use MOG\TogglClient\Request\PostTimeEntryDefinition as SUT;

class PostTimeEntryDefinition extends atoum
{
    /**
     * @dataProvider optionsDataProvider
     */
    public function testKnownOptions($optionName, $value)
    {
        $this
            ->given(
                $options = array($optionName => $value)
            )
            ->then
                ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\PostTimeEntryDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        $startDate = new \DateTime('2015-03-15 00:00:01');
        $stopDate = new \DateTime('2015-03-15 23:59:59');

        return array(
            array('description', 'Save Gotham'),
            array('workspace_id', 1),
            array('project_id', 2),
            array('task_id', 3),
            array('billable', 'true'),
            array('start', $startDate),
            array('stop', $stopDate),
            array('duration', 42),
            array('created_with', 'mog/toggl-cli'),
            array('tags', array('Joker', 'Batarang', 'Arkham')),
            array('duronly', 'true'),
            array('at', $startDate),
        );
    }

    public function testUnknownOptions()
    {
        $this
            ->given(
                $options = array('unknown_option' => true)
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
}
