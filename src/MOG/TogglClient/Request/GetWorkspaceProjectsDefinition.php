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
        $url = sprintf('workspaces/%d/projects', $this->workspaceId);

        if (!empty($this->options)) {
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
                'active',
                'actual_hours',
                'only_templates',
            )
        );

        $resolver->setAllowedValues(
            'active',
            array(
                'true',
                'false',
                'both',
            )
        );

        $resolver->setAllowedValues(
            'actual_hours',
            array(
                'true',
                'false',
            )
        );

        $resolver->setAllowedValues(
            'only_templates',
            array(
                'true',
                'false',
            )
        );
    }
}
