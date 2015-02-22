# Behat table parser

More fluent API for behat TableNodes. 

**Experimental. Need to implement sensible way of better integrating into context classes.**

## Usage

Tables used for single entities or key-value pairs:
    
    Given there is a table like this:
    | Key1 | Value1 |
    | Key2 | Value2 |
    
And a context method like this:
    
    public function thereIsATableLikeThis(TableNode $table)
    {
        $table = (new SingleEntryTable($table))
            ->requires('Key1')
        ;
        $table->get('Key1');
    }

(To be implemented next) Tables used for multiple entities:

    Given there is a table like this:
    | Key1          | Key 2         | Key 3         |
    | 1st Value 1   | 1st Value 2   | 1st Value 3   |
    | 2nd Value 1   | 2nd Value 2   | 2nd Value 3   |
    | 3rd Value 1   | 3rd Value 2   | 3rd Value 3   |

And a context method like this:
    
    public function thereIsATableLikeThis(TableNode $table)
    {
        $table = (new MultipleEntityTable($table))
            ->requires('Key1')
            ->requires('Key2')
        ;
        $table->each(function() { ... });
        $table->row(0)->get('Key1')
    }
