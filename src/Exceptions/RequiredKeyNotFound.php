<?php

namespace AdamQuaile\Behat\TableParser\Exceptions;

class RequiredKeyNotFound extends \RuntimeException
{
    public function __construct($key, $availableKeys)
    {
        parent::__construct("Table requires key '$key'. Found keys: " . implode($availableKeys, ', '));
    }

}