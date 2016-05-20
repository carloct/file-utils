<?php

namespace Belt\Test;

use Belt\Filename;

class FilenameTest extends TestCase
{

    public function testExt()
    {
        $this->assertEquals('jpg', Filename::ext('test.jpg'));
        $this->assertEquals('jpg', Filename::ext('test.bla.jpg'));
        $this->assertEquals('', Filename::ext('test'));
    }

}