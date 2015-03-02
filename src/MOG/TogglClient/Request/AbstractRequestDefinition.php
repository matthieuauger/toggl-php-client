<?php

namespace MOG\TogglClient\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractRequestDefinition implements RequestDefinitionInterface
{
    /**
     * @var array
     */
    protected $options;

    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    abstract public function getMethod();
    abstract public function getBaseUrl();

    public function getUrl()
    {
        $url = $this->getBaseUrl();

        if (!empty($this->options)) {
            $options = $this->transformOptions();

            $url = sprintf('%s?%s', $url, http_build_query($options));
        }

        return $url;
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
    }

    protected function transformOptions()
    {
        return $this->options;
    }

    public function getBody()
    {
        return array();
    }
}
