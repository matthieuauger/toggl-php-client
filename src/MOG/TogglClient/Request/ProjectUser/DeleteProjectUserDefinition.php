<?php

namespace MOG\TogglClient\Request\ProjectUser;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteProjectUserDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'DELETE';
    }

    public function getBaseUrl()
    {
        return sprintf('project_users/%d', $this->getOptions()['puid']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'puid',
            )
        );

        $resolver->setRequired('puid');
        $resolver->setAllowedTypes('puid', 'integer');
    }
}
