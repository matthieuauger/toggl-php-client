<?php

namespace MOG\TogglClient\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

class PostTimeEntryDefinition implements RequestDefinitionInterface
{
    /**
     * @var array
     */
    private $options;

    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getUrl()
    {
        return 'time_entries';
    }

    public function getOptions()
    {
        return array(
            'body' => json_encode(
                array(
                    'time_entry' => array(
                        'pid' => $this->options['project_id'],
                        'description' => $this->options['description'],
                        'start' => $this->options['start']->format('c'),
                        'duration' => $this->options['duration'],
                        'created_with' => $this->options['created_with'],
                    )
                )
            )
        );
    }

    private function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'description',
                'workspace_id',
                'project_id',
                'task_id',
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
