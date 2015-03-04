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
        return array(
            'client' => array(
                'name' => $this->options['name'],
                'wid' => $this->options['wid'],
                'notes' => $this->options['notes'],
                'hrate' => $this->options['hrate'],
                'cur' => $this->options['cur'],
                'at' => $this->options['at'],
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
