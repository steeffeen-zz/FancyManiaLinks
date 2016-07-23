<?php

use FML\Controls\FileEntry;

class FileEntryTest extends \PHPUnit_Framework_TestCase
{

    public function testFolder()
    {
        $fileEntry = new FileEntry();

        $this->assertNull($fileEntry->getFolder());

        $this->assertSame($fileEntry, $fileEntry->setFolder("test-folder"));

        $this->assertEquals("test-folder", $fileEntry->getFolder());
    }

    public function testTagName()
    {
        $fileEntry = new FileEntry();

        $this->assertEquals("fileentry", $fileEntry->getTagName());
    }

    public function testManiaScriptClass()
    {
        $fileEntry = new FileEntry();

        $this->assertEquals("CMlFileEntry", $fileEntry->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $fileEntry   = new FileEntry("test.fileentry");
        $fileEntry->clearAlign()
                  ->setFolder("some-folder");

        $domElement = $fileEntry->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<fileentry id=\"test.fileentry\" folder=\"some-folder\"/>
", $domDocument->saveXML());
    }

}
