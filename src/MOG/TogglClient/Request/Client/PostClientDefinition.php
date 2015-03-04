<?php

namespace MOG\TogglClient\Request\Client;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostClientDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return 'clients';
    }

    public function getBody()
    {
        $options = $this->getOptions();

        return array(
            'client' => array(
                'name' => $options['name'],
                'wid' => $options['wid'],
                'notes' => $options['notes'],
                'hrate' => $options['hrate'],
                'cur' => $options['cur'],
                'at' => $options['at'],
            )
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'name',
                'wid',
                'notes',
                'hrate',
                'cur',
                'at',
            )
        );

        $resolver->setRequired(
            array(
                'name',
                'wid',
            )
        );

        $resolver->setAllowedTypes(
            array(
                'name' => 'string',
                'wid' => 'integer',
                'notes' => 'string',
                'hrate' => 'float',
                'cur' => 'string',
                'at' => 'integer',
            )
        );
    }
}
