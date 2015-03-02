<?php

namespace MOG\TogglClient\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

class GetTimeEntriesDefinition implements RequestDefinitionInterface
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
        return 'GET';
    }

    public function getUrl()
    {
        $url = 'time_entries';

        if (!empty($this->options)) {
            if (true === array_key_exists('start_date', $this->options)) {
                $this->options['start_date'] = $this->options['start_date']->format('c');
            }

            if (true === array_key_exists('end_date', $this->options)) {
                $this->options['end_date'] = $this->options['end_date']->format('c');
            }

            $url = sprintf('%s?%s', $url, http_build_query($this->options));
        }

        return $url;
    }

    public function getOptions()
    {
        return array();
    }

    private function configureOptions(OptionsResolver $resolver)
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
}
