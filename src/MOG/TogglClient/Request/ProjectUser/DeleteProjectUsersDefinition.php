<?php

namespace MOG\TogglClient\Request\ProjectUser;

use MOG\TogglClient\Request\AbstractRequestDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteProjectUsersDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'DELETE';
    }

    public function getBaseUrl()
    {
        return sprintf('project_users/%s', implode(',', $this->getOptions()['puids']));
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined(
            array(
                'puids',
            )
        );

        $resolver->setRequired('puids');
        $resolver->setAllowedTypes('puids', 'array');
        $resolver->setAllowedValues(
            'puids',
            function($array) {
                return !empty($array) && count($array) === count(array_filter($array, function($element) {
                    return is_integer($element);
                }));
            }
        );
    }
}
