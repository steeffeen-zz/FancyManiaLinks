<?php

use FML\Script\Features\Preload;

class PreloadTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $preload = new Preload(array("test.url"));

        $this->assertEquals(array("test.url"), $preload->getImageUrls());
    }

    public function testImageUrls()
    {
        $preload = new Preload();

        $this->assertEmpty($preload->getImageUrls());

        $this->assertSame($preload, $preload->addImageUrl("some.url1"));

        $this->assertEquals(array("some.url1"), $preload->getImageUrls());

        $this->assertSame($preload, $preload->setImageUrls(array("some.url2", "some.url3")));

        $this->assertEquals(array("some.url2", "some.url3"), $preload->getImageUrls());

        $this->assertSame($preload, $preload->removeAllImageUrls());

        $this->assertEmpty($preload->getImageUrls());
    }

}
