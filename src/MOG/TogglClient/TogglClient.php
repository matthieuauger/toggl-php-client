<?php

namespace MOG\TogglClient;

use GuzzleHttp\Client;
use MOG\TogglClient\Request\GetTimeEntriesDefinition;
use MOG\TogglClient\Request\GetWorkspaceProjectsDefinition;
use MOG\TogglClient\Request\GetWorkspacesDefinition;
use MOG\TogglClient\Request\PostTimeEntryDefinition;
use MOG\TogglClient\Request\RequestDefinitionInterface;

class TogglClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->client = new Client(
            array(
                'base_url' => array(
                    'https://www.toggl.com/api/{version}/',
                    array(
                        'version' => 'v8'
                    )
                ),
            )
        );

        $this->client->setDefaultOption('auth', array($apiKey, 'api_token', 'Basic'));
    }

    private function send(RequestDefinitionInterface $definition)
    {
        $response = $this->client->send(
            $this->client->createRequest($definition->getMethod(), $definition->getUrl(), $definition->getOptions())
        );

        return $response->json();
    }

    /**
     * @param array $additionalParameters
     *
     * @return mixed
     */
    public function getWorkspaces(array $additionalParameters = array())
    {
        return $this->send(new GetWorkspacesDefinition($additionalParameters));
    }

    /**
     * @param $workspaceId
     * @param array $additionalParameters
     *
     * @return array
     */
    public function getWorkspaceProjects($workspaceId, array $additionalParameters = array())
    {
        return $this->send(new GetWorkspaceProjectsDefinition($workspaceId, $additionalParameters));
    }

    /**
     * @param array $additionalParameters
     *
     * @return array
     */
    public function getTimeEntries(array $additionalParameters = array())
    {
        return $this->send(new GetTimeEntriesDefinition($additionalParameters));
    }

    /**
     * @param $projectId
     * @param \DateTime $start
     * @param $duration
     * @param $description
     * @param array $additionalParameters
     *
     * @return array
     */
    public function startTimeEntry($projectId, \DateTime $start, $duration, $description, array $additionalParameters = array())
    {
        return $this->send(new PostTimeEntryDefinition($projectId, $start, $duration, $description, $additionalParameters));
    }
}
