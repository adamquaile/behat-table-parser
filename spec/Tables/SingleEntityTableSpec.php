<?php

namespace spec\AdamQuaile\Behat\TableParser\Tables;

use Behat\Gherkin\Node\TableNode;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SingleEntityTableSpec extends ObjectBehavior
{
    private $simpleTable = [
        ['Title',       'Some title'],
        ['Description', 'A description'],
    ];

    public function let()
    {
        $tableNode = new TableNode($this->simpleTable);
        $this->beConstructedWith($tableNode);
    }


    function it_chains_when_testing_for_required_keys()
    {
        $this->requires('Title')->shouldReturn($this);
    }

    function it_exposes_values()
    {
        $this->get('Title')->shouldReturn('Some title');
        $this->get('Description')->shouldReturn('A description');
    }

    function it_can_provide_default_values()
    {
        $this->get('NonRequiredKey', 7)->shouldReturn(7);
        $this->get('Title', 7)->shouldReturn('Some title');
    }

    function it_throws_exception_when_required_key_not_found()
    {
        $this->shouldThrow('AdamQuaile\Behat\TableParser\Exceptions\RequiredKeyNotFound')->duringRequires('Not Found');
    }

    function it_can_parse_as_array()
    {
        $this->parseArray()->shouldReturn(
            [
                'Title' => 'Some title',
                'Description' => 'A description'
            ]
        );
    }

    function it_can_parse_as_object()
    {
        $this->parseObject()->shouldBeLike(
            (object) [
                'Title' => 'Some title',
                'Description' => 'A description'
            ]
        );
    }


}
