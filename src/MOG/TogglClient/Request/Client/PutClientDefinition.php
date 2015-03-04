<?php

namespace MOG\TogglClient\Request\Client;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PutClientDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'PUT';
    }

    public function getBaseUrl()
    {
        return sprintf('clients/%d', $this->getOptions()['cid']);
    }

    public function getBody()
    {
        $options = $this->getOptions();

        return array(
            'client' => array(
                'name' => $options['name'],
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
                'cid',
                'name',
                'notes',
                'hrate',
                'cur',
                'at',
            )
        );

        $resolver->setRequired('cid');

        $resolver->setAllowedTypes(
            array(
                'cid' => 'integer',
                'name' => 'string',
                'notes' => 'string',
                'hrate' => 'float',
                'cur' => 'string',
                'at' => 'integer',
            )
        );
    }
}
