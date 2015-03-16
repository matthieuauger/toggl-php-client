<?php

namespace MOG\TogglClient\Request\ProjectUser;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PutProjectUserDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'PUT';
    }

    public function getBaseUrl()
    {
        return sprintf('project_users/%d', $this->getOptions()['puid']);
    }

    public function getBody()
    {
        $options = $this->getOptions();

        return array(
            'project_user' => array(
                'manager' => $options['manager'],
                'rate' => $options['rate'],
            )
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'puid',
                'manager',
                'rate',
            )
        );

        $resolver->setRequired('puid');

        $resolver->setAllowedTypes(
            array(
                'puid' => 'integer',
                'manager' => 'bool',
                'rate' => 'float',
            )
        );
    }
}
