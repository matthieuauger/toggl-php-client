<?php

namespace MOG\TogglClient\Request\TimeEntry;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostTimeEntryDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return 'time_entries';
    }

    public function getBody()
    {
        return array(
            'time_entry' => array(
                'pid' => $this->options['pid'],
                'description' => $this->options['description'],
                'start' => $this->options['start']->format('c'),
                'duration' => $this->options['duration'],
                'created_with' => 'mog/toggl-cli',
            )
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'description',
                'wid',
                'pid',
                'tid',
                'billable',
                'start',
                'stop',
                'duration',
                'created_with',
                'tags',
                'duronly',
                'at',
            )
        );
    }
}
