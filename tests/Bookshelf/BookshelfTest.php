<?php
namespace Silentnight\Challenge\Tests\Bookshelf;

use Silentnight\Challenge\Bookshelf\Bookshelf;

class BookshelfTest extends \PHPUnit\Framework\TestCase
{
    public function testImplements()
    {
        $this->assertInstanceOf(
            'Silentnight\\Challenge\\Bookshelf\\BookshelfInterface',
            new Bookshelf,
            'Bookshelf does not implement BookshelfInterface.'
        );
    }
    
    public function testConstruct()
    {
        $book = new Bookshelf;
        $this->assertEquals(0, $book->quantityStored());
        
        $book = new Bookshelf("The art of war");
        $this->assertEquals(1, $book->quantityStored());
        
        $book = new Bookshelf(["The art of war", "Through the gates of the silver key"]);
        $this->assertEquals(2, $book->quantityStored());
    }
    
    public function testinsert()
    {
        $book = new Bookshelf;
        
        $book->insert("Foundation");
        $this->assertEquals(1, $book->quantityStored());
        
        $book->insert(["The art of war", "Through the gates of the silver key"]);
        $this->assertEquals(3, $book->quantityStored());
    }
    
    public function testRemove()
    {
        $book = new Bookshelf([
            "Foundation",
            "Burning Chrome",
            "The art of war", 
            "Through the gates of the silver key"
        ]);
        
        $book->remove("Foundation");
        $this->assertEquals(3, $book->quantityStored());
    }
    
    public function testFind()
    {
        $book = new Bookshelf([
            "Foundation",
            "Burning Chrome",
            "The art of war", 
            "Through the gates of the silver key"
        ]);
        
        $this->assertEquals(0, $book->find("Foundation"));
        
        $this->assertEquals(-1, $book->find("The count of Monte Cristo"));
    }
    
    public function testCopies()
    {
        $book = new Bookshelf([
            "Foundation",
            "Burning Chrome",
            "The art of war", 
            "Through the gates of the silver key",
            "The art of war"
        ]);
        
        $this->assertEquals(2, $book->copies("The art of war"));

        $this->assertEquals(0, $book->copies("The count of Monte Cristo"));
    }
    
    public function testInventory()
    {
        $book = new Bookshelf([
            "Foundation",
            "Burning Chrome",
            "The art of war", 
            "Through the gates of the silver key",
            "The art of war"
        ]);

        $book->inventory();
        
        $this->assertFileExists("inventory.csv");

        $inventory_content = "";

        if (file_exists("inventory.csv")) {
            $inventory_content = file_get_contents("inventory.csv");
        }

        $this->assertTrue(false !== strpos($inventory_content, "Through the gates of the silver key"));
    }
}