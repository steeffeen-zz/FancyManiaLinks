<?php

use FML\Stylesheet\Mood;
use FML\Stylesheet\Style;
use FML\Stylesheet\Style3d;
use FML\Stylesheet\Stylesheet;

class StylesheetTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $stylesheet = Stylesheet::create();

        $this->assertTrue($stylesheet instanceof Stylesheet);
    }

    public function testStyles()
    {
        $stylesheet  = new Stylesheet();
        $firstStyle  = new Style();
        $secondStyle = new Style();

        $this->assertEmpty($stylesheet->getStyles());

        $this->assertSame($stylesheet, $stylesheet->addStyle($firstStyle));

        $this->assertEquals(array($firstStyle), $stylesheet->getStyles());

        $this->assertSame($stylesheet, $stylesheet->addStyle($secondStyle));
        $this->assertSame($stylesheet, $stylesheet->addStyle($firstStyle));

        $this->assertEquals(array($firstStyle, $secondStyle), $stylesheet->getStyles());

        $this->assertSame($stylesheet, $stylesheet->removeAllStyles());

        $this->assertEmpty($stylesheet->getStyles());

        $this->assertSame($stylesheet, $stylesheet->addStyle($firstStyle));

        $this->assertEquals(array($firstStyle), $stylesheet->getStyles());

        $this->assertSame($stylesheet, $stylesheet->removeStyles());

        $this->assertEmpty($stylesheet->getStyles());
    }

    public function testStyles3d()
    {
        $stylesheet    = new Stylesheet();
        $firstStyle3d  = new Style3d();
        $secondStyle3d = new Style3d();

        $this->assertEmpty($stylesheet->getStyles3d());

        $this->assertSame($stylesheet, $stylesheet->addStyle3d($firstStyle3d));

        $this->assertEquals(array($firstStyle3d), $stylesheet->getStyles3d());

        $this->assertSame($stylesheet, $stylesheet->addStyle3d($secondStyle3d));
        $this->assertSame($stylesheet, $stylesheet->addStyle3d($firstStyle3d));

        $this->assertEquals(array($firstStyle3d, $secondStyle3d), $stylesheet->getStyles3d());

        $this->assertSame($stylesheet, $stylesheet->removeAllStyles3d());

        $this->assertEmpty($stylesheet->getStyles3d());

        $this->assertSame($stylesheet, $stylesheet->addStyle3d($firstStyle3d));

        $this->assertEquals(array($firstStyle3d), $stylesheet->getStyles3d());

        $this->assertSame($stylesheet, $stylesheet->removeStyles());

        $this->assertEmpty($stylesheet->getStyles3d());
    }

    public function testMood()
    {
        $stylesheet = new Stylesheet();
        $mood       = new Mood();

        $this->assertNull($stylesheet->getMood(false));

        $this->assertSame($stylesheet, $stylesheet->setMood($mood));

        $this->assertSame($mood, $stylesheet->getMood());
        $this->assertSame($mood, $stylesheet->createMood());
        $this->assertSame($mood, $stylesheet->getMood());

        $this->assertSame($stylesheet, $stylesheet->setMood(null));

        $this->assertNull($stylesheet->getMood(false));

        $createdMood = $stylesheet->getMood(true);

        $this->assertTrue($createdMood instanceof Mood);
        $this->assertSame($createdMood, $stylesheet->getMood());
        $this->assertSame($createdMood, $stylesheet->createMood());
        $this->assertSame($createdMood, $stylesheet->getMood());
    }

    public function testRender()
    {
        $stylesheet = new Stylesheet();
        $stylesheet->addStyle3d(new Style3d("test-style", "test-model"))
                   ->setMood(new Mood());

        $domDocument = new \DOMDocument();
        $domElement  = $stylesheet->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<stylesheet><frame3dstyles><style3d id=\"test-style\" model=\"test-model\"/></frame3dstyles><mood/></stylesheet>
", $domDocument->saveXML());
    }

}
