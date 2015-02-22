<?php

namespace AdamQuaile\Behat\TableParser;

use AdamQuaile\Behat\TableParser\Tables\SingleEntryTable;
use Behat\Gherkin\Node\TableNode;

trait ParsesTables
{
    /**
     * @Transform :0
     */
    public function transformTableNodeToRelevantTableType(TableNode $singleEntryTable)
    {
        return new SingleEntryTable($singleEntryTable);
    }
}