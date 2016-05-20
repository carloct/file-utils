<?php

namespace Belt\Test;

use Belt\Folder;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        parent::tearDown();

        if(file_exists('tests/folder')) {
            Folder::rrmdir('tests/folder');
        }
    }


}