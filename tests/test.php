<?php

require_once 'BookshelfInterface.php';
require_once 'BookshelfTest.php';
require_once 'AdvancedBookshelfTest.php';
require_once 'Bookshelf.php';

$basicTests = new Silentnight\Challenge\Bookshelf\BookshelfTest;

foreach (array(
    'construct',
    'add',
    'subtract',
    'multiply',
    'divide',
) as $method) {
    try {
        $realMethodName = 'test' . ucfirst($method);
        call_user_func(array($basicTests, $realMethodName));
        echo "Basic $realMethodName() test passed\n";
    } catch (\Exception $e) {
        echo "Basic $realMethodName() test failed: {$e->getMessage()}\n";
    }
}

$advancedTests = new Silentnight\Challenge\Bookshelf\AdvancedBookshelfTest;

foreach (array(
    'construct',
    'add',
    'subtract',
    'multiply',
    'divide',
    'divideByZero',
) as $method) {
    try {
        $realMethodName = 'test' . ucfirst($method);
        call_user_func(array($advancedTests, $realMethodName));
        echo "Basic $realMethodName() test passed\n";
    } catch (\Exception $e) {
        echo "Basic $realMethodName() test failed: {$e->getMessage()}\n";
    }
}