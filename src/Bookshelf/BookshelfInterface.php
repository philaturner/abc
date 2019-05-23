<?php
namespace Silentnight\Challenge\Bookshelf;
 
interface BookshelfInterface
{
    /**
     * Adds $book to the bookshelf
     * 
     * @param $book The book to add to the bookshelf
     * @return string[] The final content of the bookshelf
     * @throws \InvalidArgumentException Thrown if $book is not a string
     */
    public function insert($n);
    
    /**
     * Removes $book from the shelf
     * 
     * @param string $book The book to be removed from the bookshelf
     * @return string[] The final content of the book
     * @throws \InvalidArgumentException Thrown if $book is not a string
     */
    public function remove($n);
    
    /**
     * Finds the position of $book in the shelf
     * 
     * @param string $book The book to search
     * @return int  -1 if not found or the position of the book in the shelf
     * @throws \InvalidArgumentException Thrown if $book is not a string
     */
    public function find($book);
    
    /**
     * Get the amount of copies of $book in the shelf
     * 
     * @param string $book The book we are looking for
     * @return int The amount of copies found
     * @throws \InvalidArgumentException Thrown if $book is not a string
     */
    public function copies($n);
    
    /**
     * Saves in a csv format the fields "bookname" and "copies" to the file "inventory.csv"
     * 
     * @return int The number of bytes written or false
     */
    public function inventory();
    
    /**
     * Gets the quantity of books stored in the shelf
     * 
     * @return int The number books in the bookshelf
     */
    public function quantityStored();

}