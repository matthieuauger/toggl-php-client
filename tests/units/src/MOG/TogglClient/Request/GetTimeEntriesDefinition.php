<?php

namespace MOG\TogglClient\Tests\Units\Request;

use atoum;
use MOG\TogglClient\Request\GetTimeEntriesDefinition as SUT;

class GetTimeEntriesDefinition extends atoum
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
                ->object(new SUT($options))->isInstanceOf('MOG\TogglClient\Request\GetTimeEntriesDefinition')
        ;
    }

    public function optionsDataProvider()
    {
        $startDate = new \DateTime('2015-03-15 00:00:01');
        $endDate = new \DateTime('2015-03-15 23:59:59');

        return array(
            array('start_date', $startDate),
            array('end_date', $endDate),
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

    public function testUrl()
    {
        $startDate = new \DateTime('2015-03-15 00:00:01');
        $endDate = new \DateTime('2015-03-15 23:59:59');

        $this
            ->given(
                $options = array('start_date' => $startDate, 'end_date' => $endDate)
            )
            ->and(
                $definition = new SUT($options)
            )
            ->then
                ->string($definition->getUrl())->isIdenticalTo(
                    sprintf(
                        'time_entries?start_date=%s&end_date=%s',
                        urlencode($startDate->format('c')),
                        urlencode($endDate->format('c'))
                    )
                )
        ;
    }
}
