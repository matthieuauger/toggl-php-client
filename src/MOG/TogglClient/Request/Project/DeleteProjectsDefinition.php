<?php

namespace MOG\TogglClient\Request\Project;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteProjectsDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'DELETE';
    }

    public function getBaseUrl()
    {
        return sprintf('projects/%s', implode(',', $this->getOptions()['pids']));
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'pids',
            )
        );

        $resolver->setRequired('pids');
        $resolver->setAllowedTypes('pids', 'array');
        $resolver->setAllowedValues(
            'pids',
            function($array) {
                return !empty($array) && count($array) === count(array_filter($array, function($element) {
                    return is_integer($element);
                }));
            }
        );
    }
}
