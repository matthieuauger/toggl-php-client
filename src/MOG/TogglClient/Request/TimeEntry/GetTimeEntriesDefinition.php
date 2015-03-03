<?php

namespace MOG\TogglClient\Request\TimeEntry;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetTimeEntriesDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return 'time_entries';
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'start_date',
                'end_date',
            )
        );

        $resolver->setAllowedTypes('start_date', 'DateTime');
        $resolver->setAllowedTypes('end_date', 'DateTime');
    }

    protected function transformOptions()
    {
        $transformedOptions = $this->getOptions();

        if (true === array_key_exists('start_date', $transformedOptions)) {
            $transformedOptions['start_date'] = $transformedOptions['start_date']->format('c');
        }

        if (true === array_key_exists('end_date', $transformedOptions)) {
            $transformedOptions['end_date'] = $transformedOptions['end_date']->format('c');
        }

        return $transformedOptions;
    }
}
