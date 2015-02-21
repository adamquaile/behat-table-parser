<?php

namespace AdamQuaile\Behat\TableParser\Tables;

use AdamQuaile\Behat\TableParser\Exceptions\RequiredKeyNotFound;
use Behat\Gherkin\Node\TableNode;

class SingleEntryTable
{
    /**
     * @var array
     */
    private $data;

    public function __construct(TableNode $table)
    {
        $this->data = $table->getRowsHash();
    }

    public function requires($key)
    {
        if (!array_key_exists($key, $this->data)) {
            throw new RequiredKeyNotFound($key, array_keys($this->data));
        }
        return $this;
    }

    public function parseArray()
    {
        return $this->data;
    }


    public function parseObject()
    {
        return (object) $this->data;
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } else {
            return $default;
        }
    }
}
