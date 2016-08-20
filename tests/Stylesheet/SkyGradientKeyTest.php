<?php

use FML\Stylesheet\SkyGradientKey;

class SkyGradientKeyTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $skyGradientKey = SkyGradientKey::create(13.37, "some-color");

        $this->assertTrue($skyGradientKey instanceof SkyGradientKey);
        $this->assertEquals(13.37, $skyGradientKey->getX());
        $this->assertEquals("some-color", $skyGradientKey->getColor());
    }

    public function testConstruct()
    {
        $skyGradientKey = new SkyGradientKey(42.42, "other-color");

        $this->assertEquals(42.42, $skyGradientKey->getX());
        $this->assertEquals("other-color", $skyGradientKey->getColor());
    }

    public function testX()
    {
        $skyGradientKey = new SkyGradientKey();

        $this->assertNull($skyGradientKey->getX());

        $this->assertSame($skyGradientKey, $skyGradientKey->setX(12.34));

        $this->assertEquals(12.34, $skyGradientKey->getX());
    }

    public function testColor()
    {
        $skyGradientKey = new SkyGradientKey();

        $this->assertNull($skyGradientKey->getColor());

        $this->assertSame($skyGradientKey, $skyGradientKey->setColor("test-color"));

        $this->assertEquals("test-color", $skyGradientKey->getColor());
    }

    public function testRender()
    {
        $skyGradientKey = new SkyGradientKey();
        $skyGradientKey->setX(08.15)
                       ->setColor("sky-color");

        $domDocument = new \DOMDocument();
        $domElement  = $skyGradientKey->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<key x=\"8.15\" color=\"sky-color\"/>
", $domDocument->saveXML());
    }

}
