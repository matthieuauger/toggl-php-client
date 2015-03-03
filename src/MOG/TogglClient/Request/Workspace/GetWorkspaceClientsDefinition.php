<?php

namespace MOG\TogglClient\Request\Workspace;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetWorkspaceClientsDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('workspaces/%d/clients', $this->getOptions()['wid']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'wid',
            )
        );

        $resolver->setRequired('wid');
    }
}
