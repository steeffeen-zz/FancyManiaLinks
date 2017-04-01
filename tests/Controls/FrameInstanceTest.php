<?php

use FML\Controls\FrameInstance;
use FML\Elements\FrameModel;

class FrameInstanceTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $frameInstance = FrameInstance::create("test.frame.instance", "test.model");

        $this->assertTrue($frameInstance instanceof FrameInstance);
        $this->assertEquals("test.frame.instance", $frameInstance->getId());
        $this->assertEquals("test.model", $frameInstance->getModelId());
    }

    public function testModelId()
    {
        $frameInstance = new FrameInstance();

        $this->assertNull($frameInstance->getModelId());

        $this->assertSame($frameInstance, $frameInstance->setModelId("model.id"));

        $this->assertEquals("model.id", $frameInstance->getModelId());
    }

    public function testModel()
    {
        $frameInstance = new FrameInstance();
        $frameModel    = new FrameModel();

        $this->assertNull($frameInstance->getModel());

        $this->assertSame($frameInstance, $frameInstance->setModel($frameModel));

        $this->assertSame($frameModel, $frameInstance->getModel());
    }

    public function testModelIdAndModel()
    {
        $frameInstance = new FrameInstance();
        $frameModel    = new FrameModel();

        $this->assertNull($frameInstance->getModelId());
        $this->assertNull($frameInstance->getModel());

        $frameInstance->setModelId("test.model.id");

        $this->assertEquals("test.model.id", $frameInstance->getModelId());
        $this->assertNull($frameInstance->getModel());

        $frameInstance->setModel($frameModel);

        $this->assertNull($frameInstance->getModelId());
        $this->assertSame($frameModel, $frameInstance->getModel());

        $frameInstance->setModelId("other.model.id");

        $this->assertEquals("other.model.id", $frameInstance->getModelId());
        $this->assertNull($frameInstance->getModel());
    }

    public function testTagName()
    {
        $frameInstance = new FrameInstance();

        $this->assertEquals("frameinstance", $frameInstance->getTagName());
    }

    public function testManiaScriptClass()
    {
        $frameInstance = new FrameInstance();

        $this->assertEquals("CMlFrame", $frameInstance->getManiaScriptClass());
    }

    public function testRenderWithModelId()
    {
        $domDocument   = new \DOMDocument();
        $frameInstance = new FrameInstance("test.frame.instance");
        $frameInstance->clearAlign()
                      ->setModelId("some.id");

        $domElement = $frameInstance->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<frameinstance id=\"test.frame.instance\" modelid=\"some.id\"/>
", $domDocument->saveXML());
    }

    public function testRenderWithModel()
    {
        $domDocument   = new \DOMDocument();
        $frameInstance = new FrameInstance("test.frame.instance");
        $frameModel    = new FrameModel("test.model.id");
        $frameInstance->clearAlign()
                      ->setModel($frameModel);

        $domElement = $frameInstance->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<frameinstance id=\"test.frame.instance\" modelid=\"test.model.id\"/>
", $domDocument->saveXML());
    }

}
