<?php

namespace MOG\TogglClient\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

class GetWorkspaceProjectsDefinition implements RequestDefinitionInterface
{
    /**
     * @var integer
     */
    private $workspaceId;

    /**
     * @var array
     */
    private $options;

    public function __construct($workspaceId, array $options = array())
    {
        $this->workspaceId = $workspaceId;

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
        return sprintf('workspaces/%d/projects', $this->workspaceId);
    }

    private function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'active',
                'actual_hours',
                'only_templates',
            )
        );

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
}
