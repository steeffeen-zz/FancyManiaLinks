<?php

use FML\Elements\Music;

class MusicTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $music = Music::create("test.url");

        $this->assertNotNull($music);
        $this->assertEquals($music->getData(), "test.url");
    }

    public function testConstruct()
    {
        $music = new Music("some.url");

        $this->assertEquals($music->getData(), "some.url");
    }

    public function testData()
    {
        $music = new Music();

        $this->assertNull($music->getData());

        $this->assertSame($music->setData("other.url"), $music);

        $this->assertEquals($music->getData(), "other.url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $music       = new Music("data.url");

        $domElement = $music->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<music data=\"data.url\"/>
");
    }

}
