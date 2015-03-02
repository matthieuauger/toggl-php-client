<?php

namespace MOG\TogglClient\Request\Workspace;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetWorkspaceProjectsDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('workspaces/%d/projects', $this->options['wid']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'wid',
                'active',
                'actual_hours',
                'only_templates',
            )
        );

        $resolver->setRequired('wid');

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

        if (array_key_exists('active', $this->options)) {
            if (true === $this->options['active']) {
                $transformedOptions['active'] = 'true';
            } elseif (false === $this->options['active']) {
                $transformedOptions['active'] = 'false';
            }
        }

        if (true === array_key_exists('actual_hours', $this->options)) {
            $transformedOptions['actual_hours'] = $transformedOptions['actual_hours'] ? 'true' : 'false';
        }

        if (true === array_key_exists('only_templates', $this->options)) {
            $transformedOptions['only_templates'] = $transformedOptions['only_templates'] ? 'true' : 'false';
        }

        return $transformedOptions;
    }
}
