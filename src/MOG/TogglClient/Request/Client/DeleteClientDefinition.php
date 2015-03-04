<?php

namespace MOG\TogglClient\Request\Client;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteClientDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'DELETE';
    }

    public function getBaseUrl()
    {
        return sprintf('clients/%d', $this->getOptions()['cid']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'cid',
            )
        );

        $resolver->setRequired('cid');
        $resolver->setAllowedTypes('cid', 'integer');
    }
}
