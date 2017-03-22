<?php

use FML\Controls\Quad;

class QuadTest extends \PHPUnit_Framework_TestCase
{

    public function testImageUrl()
    {
        $quad = new Quad();

        $this->assertNull($quad->getImageUrl());

        $this->assertSame($quad, $quad->setImageUrl("test.url"));

        $this->assertEquals("test.url", $quad->getImageUrl());
    }

    public function testImageId()
    {
        $quad = new Quad();

        $this->assertNull($quad->getImageId());

        $this->assertSame($quad, $quad->setImageId("test-id"));

        $this->assertEquals("test-id", $quad->getImageId());
    }

    public function testImageFocusUrl()
    {
        $quad = new Quad();

        $this->assertNull($quad->getImageFocusUrl());

        $this->assertSame($quad, $quad->setImageFocusUrl("test.url"));

        $this->assertEquals("test.url", $quad->getImageFocusUrl());
    }

    public function testImageFocusId()
    {
        $quad = new Quad();

        $this->assertNull($quad->getImageFocusId());

        $this->assertSame($quad, $quad->setImageFocusId("test-id"));

        $this->assertEquals("test-id", $quad->getImageFocusId());
    }

    public function testColorize()
    {
        $quad = new Quad();

        $this->assertNull($quad->getColorize());

        $this->assertSame($quad, $quad->setColorize("test-colorize"));

        $this->assertEquals("test-colorize", $quad->getColorize());
    }

    public function testModulizeColor()
    {
        $quad = new Quad();

        $this->assertNull($quad->getModulizeColor());

        $this->assertSame($quad, $quad->setModulizeColor("test-color"));

        $this->assertEquals("test-color", $quad->getModulizeColor());
    }

    public function testAutoScale()
    {
        $quad = new Quad();

        $this->assertTrue($quad->getAutoScale());

        $this->assertSame($quad, $quad->setAutoScale(false));

        $this->assertFalse($quad->getAutoScale());
    }

    public function testAutoScaleFixedWidth()
    {
        $quad = new Quad();

        $this->assertEquals(-1., $quad->getAutoScaleFixedWidth());

        $this->assertSame($quad, $quad->setAutoScaleFixedWidth(13.37));

        $this->assertEquals(13.37, $quad->getAutoScaleFixedWidth());
    }

    public function testKeepRatio()
    {
        $quad = new Quad();

        $this->assertNull($quad->getKeepRatio());

        $this->assertSame($quad, $quad->setKeepRatio("test-ratio-mode"));

        $this->assertEquals("test-ratio-mode", $quad->getKeepRatio());
    }

    public function testOpacity()
    {
        $quad = new Quad();

        $this->assertEquals(1., $quad->getOpacity());

        $this->assertSame($quad, $quad->setOpacity(0.7));

        $this->assertEquals(0.7, $quad->getOpacity());
    }

    public function testBackgroundColor()
    {
        $quad = new Quad();

        $this->assertNull($quad->getBackgroundColor());

        $this->assertSame($quad, $quad->setBackgroundColor("test-color"));

        $this->assertEquals("test-color", $quad->getBackgroundColor());
    }

    public function testAction()
    {
        $quad = new Quad();

        $this->assertNull($quad->getAction());

        $this->assertSame($quad, $quad->setAction("test-action"));

        $this->assertEquals("test-action", $quad->getAction());
    }

    public function testActionKey()
    {
        $quad = new Quad();

        $this->assertEquals(-1, $quad->getActionKey());

        $this->assertSame($quad, $quad->setActionKey(13));

        $this->assertEquals(13, $quad->getActionKey());
    }

    public function testUrl()
    {
        $quad = new Quad();

        $this->assertNull($quad->getUrl());

        $this->assertSame($quad, $quad->setUrl("test.url"));

        $this->assertEquals("test.url", $quad->getUrl());
    }

    public function testUrlId()
    {
        $quad = new Quad();

        $this->assertNull($quad->getUrlId());

        $this->assertSame($quad, $quad->setUrlId("test-urlid"));

        $this->assertEquals("test-urlid", $quad->getUrlId());
    }

    public function testManialink()
    {
        $quad = new Quad();

        $this->assertNull($quad->getManialink());

        $this->assertSame($quad, $quad->setManialink("test-manialink"));

        $this->assertEquals("test-manialink", $quad->getManialink());
    }

    public function testManialinkId()
    {
        $quad = new Quad();

        $this->assertNull($quad->getManialinkId());

        $this->assertSame($quad, $quad->setManialinkId("test-manialinkid"));

        $this->assertEquals("test-manialinkid", $quad->getManialinkId());
    }

    public function testScriptEvents()
    {
        $quad = new Quad();

        $this->assertNull($quad->getScriptEvents());

        $this->assertSame($quad, $quad->setScriptEvents(true));

        $this->assertTrue($quad->getScriptEvents());
    }

    public function testScriptActionAndParameters()
    {
        $quad = new Quad();

        $this->assertNull($quad->getScriptAction());
        $this->assertNull($quad->getScriptActionParameters());

        $this->assertSame($quad, $quad->setScriptAction("test-action"));

        $this->assertEquals("test-action", $quad->getScriptAction());
        $this->assertNull($quad->getScriptActionParameters());

        $this->assertSame($quad, $quad->setScriptAction("test-action-2", array("param1", "param2")));

        $this->assertEquals("test-action-2", $quad->getScriptAction());
        $this->assertEquals(array("param1", "param2"), $quad->getScriptActionParameters());
    }

    public function testStyle()
    {
        $quad = new Quad();

        $this->assertNull($quad->getStyle());

        $this->assertSame($quad, $quad->setStyle("test-style"));

        $this->assertEquals("test-style", $quad->getStyle());
    }

    public function testSubStyle()
    {
        $quad = new Quad();

        $this->assertNull($quad->getSubStyle());

        $this->assertSame($quad, $quad->setSubStyle("test-substyle"));

        $this->assertEquals("test-substyle", $quad->getSubStyle());
    }

    public function testStyles()
    {
        $quad = new Quad();

        $this->assertNull($quad->getStyle());
        $this->assertNull($quad->getSubStyle());

        $this->assertSame($quad, $quad->setStyles("test-style", "test-substyle"));

        $this->assertEquals("test-style", $quad->getStyle());
        $this->assertEquals("test-substyle", $quad->getSubStyle());
    }

    public function testStyleSelected()
    {
        $quad = new Quad();

        $this->assertNull($quad->getStyleSelected());

        $this->assertSame($quad, $quad->setStyleSelected(true));

        $this->assertTrue($quad->getStyleSelected());
    }

    public function testTagName()
    {
        $quad = new Quad();

        $this->assertEquals("quad", $quad->getTagName());
    }

    public function testManiaScriptClass()
    {
        $quad = new Quad();

        $this->assertEquals("CMlQuad", $quad->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $quad        = new Quad("test.quad");
        $quad->clearAlign()
             ->setImageUrl("some.url")
             ->setImageId("some-id")
             ->setImageFocusUrl("some.url")
             ->setImageFocusId("some-id")
             ->setColorize("some-color")
             ->setModulizeColor("some-color")
             ->setAutoScale(false)
             ->setAutoScaleFixedWidth(42.42)
             ->setKeepRatio("some-mode")
             ->setOpacity(0.5)
             ->setBackgroundColor("some-color")
             ->setAction("some-action")
             ->setActionKey(42)
             ->setUrl("some.url")
             ->setUrlId("some.urlid")
             ->setManialink("some-manialink")
             ->setManialinkId("some-manialinkid")
             ->setScriptEvents(true)
             ->setScriptAction("some-action", array("param1", "param2"))
             ->setStyle("some-style")
             ->setSubStyle("some-substyle")
             ->setStyleSelected(true);

        $domElement = $quad->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<quad id=\"test.quad\" image=\"some.url\" imageid=\"some-id\" imagefocus=\"some.url\" imagefocusid=\"some-id\" colorize=\"some-color\" modulizecolor=\"some-color\" autoscale=\"0\" autoscalefixedWidth=\"42.42\" keepratio=\"some-mode\" opacity=\"0.5\" bgcolor=\"some-color\" action=\"some-action\" actionkey=\"42\" url=\"some.url\" urlid=\"some.urlid\" manialink=\"some-manialink\" manialinkid=\"some-manialinkid\" scriptevents=\"1\" scriptaction=\"some-action'param1'param2\" style=\"some-style\" substyle=\"some-substyle\" styleselected=\"1\"/>
", $domDocument->saveXML());
    }

}
