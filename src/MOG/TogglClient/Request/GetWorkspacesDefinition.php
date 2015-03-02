<?php

namespace MOG\TogglClient\Request;

class GetWorkspacesDefinition implements RequestDefinitionInterface
{
    /**
     * @var array
     */
    private $additionalParameters;

    public function __construct(array $additionalParameters = array())
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function getMethod()
    {
        return 'GET';
    }

    public function getUrl()
    {
        return 'workspaces';
    }

    public function getOptions()
    {
        return array();
    }
}
