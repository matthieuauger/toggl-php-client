<?php

namespace MOG\TogglClient\Request;

interface RequestDefinitionInterface
{
    public function getMethod();
    public function getUrl();
}
