<?php

namespace MOG\TogglClient\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractRequestDefinition implements RequestDefinitionInterface
{
    /**
     * @var array
     */
    private $optional = array();

    /**
     * @var array
     */
    private $required = array();

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $options = $resolver->resolve($options);

        foreach ($options as $optionName => $optionValue) {
            if ($resolver->isRequired($optionName)) {
                $this->required[$optionName] = $optionValue;
            } else {
                $this->optional[$optionName] = $optionValue;
            }
        }
    }

    /**
     * @return string
     */
    abstract public function getMethod();

    /**
     * @return string
     */
    abstract public function getBaseUrl();

    /**
     * @return string
     */
    public function getUrl()
    {
        $url = $this->getBaseUrl();

        if ('GET' === $this->getMethod() && !empty($this->optional)) {
            $options = $this->transformOptions();

            $url = sprintf('%s?%s', $url, http_build_query($options));
        }

        return $url;
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return array();
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return array_merge($this->required, $this->optional);
    }

    /**
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
    }

    /**
     * @return array
     */
    protected function transformOptions()
    {
        return $this->getOptions();
    }
}
