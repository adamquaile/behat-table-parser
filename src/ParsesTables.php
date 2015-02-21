<?php

namespace AdamQuaile\Behat\TableParser;

use Behat\Gherkin\Node\TableNode;

trait ParsesTables
{
    public function singleEntityTable(TableNode $table)
    {
        return new SingleEntityTable($table);
    }
}