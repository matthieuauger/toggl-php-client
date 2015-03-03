<?php

namespace MOG\TogglClient;

use GuzzleHttp\Client;
use MOG\TogglClient\Request\Client\PostClientDefinition;
use MOG\TogglClient\Request\Workspace\GetWorkspaceProjectsDefinition;
use MOG\TogglClient\Request\Workspace\GetWorkspacesDefinition;
use MOG\TogglClient\Request\TimeEntry\GetTimeEntriesDefinition;
use MOG\TogglClient\Request\TimeEntry\PostTimeEntryDefinition;
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
            $this->client->createRequest(
                $definition->getMethod(),
                $definition->getUrl(),
                array(
                    'body' => json_encode($definition->getBody()),
                )
            )
        );

        return $response->json();
    }

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function postClient(array $options = array())
    {
        return $this->send(new PostClientDefinition($options));
    }

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function getWorkspaces(array $options = array())
    {
        return $this->send(new GetWorkspacesDefinition($options));
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getWorkspaceProjects(array $options = array())
    {
        return $this->send(new GetWorkspaceProjectsDefinition($options));
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getTimeEntries(array $options = array())
    {
        return $this->send(new GetTimeEntriesDefinition($options));
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function startTimeEntry(array $options = array())
    {
        return $this->send(new PostTimeEntryDefinition($options));
    }
}
