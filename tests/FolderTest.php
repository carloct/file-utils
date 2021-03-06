<?php

namespace Belt\Test;

use Belt\Folder;

class FolderTest extends TestCase{

    public function testCreate()
    {
        Folder::create('./tests/folder');

        $this->assertFileExists('./tests/folder');
    }

    public function testRrmdir()
    {
        mkdir('tests/folder/folder2', 0777, true);
        touch('tests/folder/test.dat');
        touch('tests/folder/test2.dat');
        touch('tests/folder/folder2/test2.dat');
        touch('tests/folder/folder2/test2.dat');


        Folder::rrmdir('tests/folder');
        $this->assertFileNotExists('tests/folder');
    }

    public function testEmptyFolder()
    {
        mkdir('tests/folder/folder2/folder3', 0777, true);
        touch('tests/folder/test.dat');
        touch('tests/folder/test2.dat');
        touch('tests/folder/folder2/test2.dat');
        touch('tests/folder/folder2/test2.dat');
        touch('tests/folder/folder2/folder3/test2.dat');
        touch('tests/folder/folder2/folder3/test2.dat');

        Folder::empty('tests/folder');
        $this->assertFileExists('tests/folder');
        $this->assertEmpty(glob('tests/folder/*'));
    }
}