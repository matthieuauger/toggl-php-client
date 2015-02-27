<?php

namespace MOG\TogglClient;

use GuzzleHttp\Client;

class TogglClient
{
    private $client;

    public function __construct($apiKey)
    {
        $this->client = new Client();
        $this->client->setDefaultOption('auth', array($apiKey, 'api_token', 'Basic'));
    }

    public function getWorkspaces()
    {
        return $this->client->get('https://www.toggl.com/api/v8/workspaces')->json();
    }
}
