<?php

namespace MOG\TogglClient\Request;

class GetWorkspacesDefinition implements RequestDefinitionInterface
{
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
