<?php

namespace MOG\TogglClient\Request\Project;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostProjectDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return 'projects';
    }

    public function getBody()
    {
        $options = $this->getOptions();

        return array(
            'project' => array(
                'name' => $options['name'],
                'wid' => $options['wid'],
                'cid' => $options['cid'],
                'active' => $options['active'],
                'is_private' => $options['is_private'],
                'template' => $options['template'],
                'template_id' => $options['template_id'],
                'billable' => $options['billable'],
                'auto_estimates' => $options['auto_estimates'],
                'estimated_hours' => $options['estimated_hours'],
                'color' => $options['color'],
                'rate' => $options['rate'],
            )
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'name',
                'wid',
                'cid',
                'active',
                'is_private',
                'template',
                'template_id',
                'billable',
                'auto_estimates',
                'estimated_hours',
                'color',
                'rate',
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
                'cid' => 'integer',
                'active' => 'bool',
                'is_private' => 'bool',
                'template' => 'bool',
                'template_id' => 'integer',
                'billable' => 'bool',
                'auto_estimates' => 'bool',
                'estimated_hours' => 'integer',
                'color' => 'integer',
                'rate' => 'float',
            )
        );
    }
}
