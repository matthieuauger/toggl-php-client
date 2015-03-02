<?php

namespace MOG\TogglClient\Request\Workspace;

use MOG\TogglClient\Request\AbstractRequestDefinition;

class GetWorkspacesDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return 'workspaces';
    }
}
