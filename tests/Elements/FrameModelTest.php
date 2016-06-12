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
        $this->assertEquals($frameModel->getId(), "test-id");
        $this->assertEquals($frameModel->getChildren(), array($child));
    }

    public function testConstruct()
    {
        $child      = new Including();
        $frameModel = new FrameModel("some-id", array($child));

        $this->assertEquals($frameModel->getId(), "some-id");
        $this->assertEquals($frameModel->getChildren(), array($child));
    }

    public function testId()
    {
        $frameModel = new FrameModel();

        $generatedId = $frameModel->getId();
        $this->assertNotNull($generatedId);
        $this->assertEquals($frameModel->getId(), $generatedId);

        $this->assertSame($frameModel->setId("other-id"), $frameModel);

        $this->assertEquals($frameModel->getId(), "other-id");
    }

    public function testChildren()
    {
        $frameModel  = new FrameModel();
        $firstChild  = new Including();
        $secondChild = new Including();

        $this->assertEmpty($frameModel->getChildren());

        $this->assertSame($frameModel->addChild($firstChild), $frameModel);

        $this->assertEquals($frameModel->getChildren(), array($firstChild));

        $this->assertSame($frameModel->addChildren(array($firstChild, $secondChild)), $frameModel);

        $this->assertEquals($frameModel->getChildren(), array($firstChild, $secondChild));

        $this->assertSame($frameModel->removeAllChildren(), $frameModel);

        $this->assertEmpty($frameModel->getChildren());
    }

    public function testFormat()
    {
        $format     = new Format();
        $frameModel = new FrameModel();

        $this->assertNull($frameModel->getFormat());

        $this->assertSame($frameModel->setFormat($format), $frameModel);

        $this->assertSame($frameModel->getFormat(), $format);
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

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<framemodel id=\"model-id\"><format/><include/></framemodel>
");
    }

}
