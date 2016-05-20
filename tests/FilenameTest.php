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

    public function testSanitize()
    {
        $this->assertEquals('test.jpeg', Filename::sanitize('te@££#[]{},st.jpeg'));
    }
    
    public function testAppendEntropy()
    {
        $output = Filename::appendEntropy('test.jpg', 8);
        
        $this->assertEquals(17, strlen($output));
        $this->assertEquals('jpg', pathinfo($output, PATHINFO_EXTENSION));

    }
    
    public function testPrependEntropy()
    {
        $output = Filename::prependEntropy('test.jpg', 8);
        
        $this->assertEquals(17, strlen($output));
    }

}