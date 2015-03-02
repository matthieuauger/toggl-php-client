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
        $transformedOptions = $this->options;

        if (true === array_key_exists('start_date', $this->options)) {
            $transformedOptions['start_date'] = $this->options['start_date']->format('c');
        }

        if (true === array_key_exists('end_date', $this->options)) {
            $transformedOptions['end_date'] = $this->options['end_date']->format('c');
        }

        return $transformedOptions;
    }
}
