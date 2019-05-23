<?php
namespace Silentnight\Challenge\Tests\BasicOop;

use Silentnight\Challenge\Bookshelf\Bookshelf;

class AdvancedBookshelfTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider getIntValue
     * @expectedException InvalidArgumentException
     */
    public function testInsert($value)
    {
        $book = new Bookshelf;
        $book->insert($value);
    }
    
    /**
     * @dataPrvoider getIntValue
     * @expectedException InvalidArgumentException
     */
    public function testRemove($value)
    {
        $book = new Bookshelf;
        $book->remove($value);
    }
    
    /**
     * @dataProvider getIntValue
     * @expectedException InvalidArgumentException
     */
    public function testFind($value)
    {
        $book = new Bookshelf;
        $book->find($value);
    }
    
    /**
     * @dataProvider getIntValue
     * @expectedException InvalidArgumentException
     */
    public function testCopies($value)
    {
        $book = new Bookshelf;
        $book->copies($value);
    }
    
    public function getIntValue()
    {
        return rand();
    }
}