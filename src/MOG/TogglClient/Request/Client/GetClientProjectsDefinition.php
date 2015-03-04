<?php

namespace MOG\TogglClient\Request\Client;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetClientProjectsDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('clients/%d/projects', $this->getOptions()['cid']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'cid',
                'active',
                'actual_hours',
                'only_templates',
            )
        );

        $resolver->setRequired('cid');

        $resolver->setAllowedValues(
            'active',
            array(
                true,
                false,
                'both',
            )
        );

        $resolver->setAllowedTypes('actual_hours', 'bool');
        $resolver->setAllowedTypes('only_templates', 'bool');
    }

    protected function transformOptions()
    {
        $transformedOptions = array();

        if (array_key_exists('active', $this->getOptions())) {
            if (true === $this->getOptions()['active']) {
                $transformedOptions['active'] = 'true';
            } elseif (false === $this->getOptions()['active']) {
                $transformedOptions['active'] = 'false';
            }
        }

        if (true === array_key_exists('actual_hours', $this->getOptions())) {
            $transformedOptions['actual_hours'] = $transformedOptions['actual_hours'] ? 'true' : 'false';
        }

        if (true === array_key_exists('only_templates', $this->getOptions())) {
            $transformedOptions['only_templates'] = $transformedOptions['only_templates'] ? 'true' : 'false';
        }

        return $transformedOptions;
    }
}
