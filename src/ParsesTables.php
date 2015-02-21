<?php

namespace AdamQuaile\Behat\TableParser;

use AdamQuaile\Behat\TableParser\Tables\SingleEntryTable;
use Behat\Gherkin\Node\TableNode;

trait ParsesTables
{
    /**
     * @Transform singleEntryTable
     */
    public function transformTableNodeToSingleEntryTable(TableNode $tableNode)
    {
        return new SingleEntryTable($tableNode);
    }

    public function singleEntryTable(TableNode $table)
    {
        return new SingleEntryTable($table);
    }
}