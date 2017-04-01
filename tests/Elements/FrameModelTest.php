<?php

use FML\Elements\Format;
use FML\Elements\FrameModel;
use FML\Elements\Including;

class FrameModelTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $child      = new Including();
        $frameModel = FrameModel::create("test-id", array($child));

        $this->assertNotNull($frameModel);
        $this->assertEquals("test-id", $frameModel->getId());
        $this->assertEquals(array($child), $frameModel->getChildren());
    }

    public function testConstruct()
    {
        $child      = new Including();
        $frameModel = new FrameModel("some-id", array($child));

        $this->assertEquals("some-id", $frameModel->getId());
        $this->assertEquals(array($child), $frameModel->getChildren());
    }

    public function testId()
    {
        $frameModel = new FrameModel();

        $generatedId = $frameModel->getId();

        $this->assertNotNull($generatedId);
        $this->assertEquals($generatedId, $frameModel->getId());

        $this->assertSame($frameModel, $frameModel->setId("other-id"));

        $this->assertEquals("other-id", $frameModel->getId());
    }

    public function testChildren()
    {
        $frameModel  = new FrameModel();
        $firstChild  = new Including();
        $secondChild = new Including();

        $this->assertEmpty($frameModel->getChildren());

        $this->assertSame($frameModel, $frameModel->addChild($firstChild));

        $this->assertEquals(array($firstChild), $frameModel->getChildren());

        $this->assertSame($frameModel, $frameModel->addChildren(array($firstChild, $secondChild)));

        $this->assertEquals(array($firstChild, $secondChild), $frameModel->getChildren());

        $this->assertSame($frameModel, $frameModel->removeAllChildren());

        $this->assertEmpty($frameModel->getChildren());

        $this->assertSame($frameModel, $frameModel->add($firstChild));

        $this->assertEquals(array($firstChild), $frameModel->getChildren());

        $this->assertSame($frameModel, $frameModel->removeChildren());

        $this->assertEmpty($frameModel->getChildren());
    }

    public function testFormat()
    {
        $format     = new Format();
        $frameModel = new FrameModel();

        $this->assertNull($frameModel->getFormat(false));

        $createdFormat = $frameModel->getFormat();

        $this->assertTrue($createdFormat instanceof Format);
        $this->assertSame($createdFormat, $frameModel->getFormat());

        $this->assertSame($frameModel, $frameModel->setFormat($format));

        $this->assertSame($format, $frameModel->getFormat());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $frameModel  = new FrameModel();
        $frameModel->setId("model-id")
                   ->addChild(new Including())
                   ->setFormat(new Format());

        $domElement = $frameModel->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<framemodel id=\"model-id\"><format/><include/></framemodel>
", $domDocument->saveXML());
    }

}
