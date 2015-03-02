<?php

namespace MOG\TogglClient\Request;

class PostTimeEntryDefinition implements RequestDefinitionInterface
{
    /**
     * @var integer
     */
    private $projectId;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array
     */
    private $additionalParameters;

    public function __construct($projectId, \DateTime $start, $duration, $description, array $additionalParameters = array())
    {
        $this->projectId = $projectId;
        $this->start = $start;
        $this->duration = $duration;
        $this->description = $description;
        $this->additionalParameters = $additionalParameters;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getUrl()
    {
        return 'time_entries';
    }

    public function getOptions()
    {
        return array(
            'body' => json_encode(
                array(
                    'time_entry' => array(
                        'pid' => $this->projectId,
                        'description' => $this->description,
                        'start' => $this->start->format('c'),
                        'duration' => $this->duration,
                        'created_with' => 'mog/toggl-cli',
                    )
                )
            )
        );
    }
}
