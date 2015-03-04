<?php

namespace MOG\TogglClient\Request\Project;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetProjectTasksDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('projects/%d/tasks', $this->getOptions()['pid']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'pid',
            )
        );

        $resolver->setRequired('pid');
        $resolver->setAllowedTypes('pid', 'integer');
    }
}
