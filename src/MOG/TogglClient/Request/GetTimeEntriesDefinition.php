<?php

namespace MOG\TogglClient\Request;

class GetTimeEntriesDefinition implements RequestDefinitionInterface
{
    /**
     * @var array
     */
    private $additionalParameters;

    public function __construct(array $additionalParameters = array())
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function getMethod()
    {
        return 'GET';
    }

    public function getUrl()
    {
        return 'time_entries';
    }

    public function getOptions()
    {
        return array();
    }
}
