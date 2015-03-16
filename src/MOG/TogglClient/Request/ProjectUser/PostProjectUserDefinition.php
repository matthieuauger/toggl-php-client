<?php

namespace MOG\TogglClient\Request\ProjectUser;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostProjectUserDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return 'project_users';
    }

    public function getBody()
    {
        $options = $this->getOptions();

        return array(
            'project' => array(
                'pid' => $options['pid'],
                'uid' => $options['uid'],
                'wid' => $options['wid'],
                'manager' => $options['manager'],
                'rate' => $options['rate'],
            )
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'pid',
                'uid',
                'wid',
                'manager',
                'rate',
            )
        );

        $resolver->setRequired(
            array(
                'pid',
                'uid',
            )
        );

        $resolver->setAllowedTypes(
            array(
                'pid' => 'integer',
                'uid' => 'integer',
                'wid' => 'integer',
                'manager' => 'bool',
                'rate' => 'float',
            )
        );
    }
}
