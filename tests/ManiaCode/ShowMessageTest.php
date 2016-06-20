<?php

use FML\ManiaCode\ShowMessage;

class ShowMessageTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $showMessage = ShowMessage::create("create-message");

        $this->assertTrue($showMessage instanceof ShowMessage);
        $this->assertEquals($showMessage->getMessage(), "create-message");
    }

    public function testConstruct()
    {
        $showMessage = new ShowMessage("new-message");

        $this->assertEquals($showMessage->getMessage(), "new-message");
    }

    public function testMessage()
    {
        $showMessage = new ShowMessage();

        $this->assertNull($showMessage->getMessage());

        $this->assertSame($showMessage->setMessage("test-message"), $showMessage);

        $this->assertEquals($showMessage->getMessage(), "test-message");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $showMessage = new ShowMessage("some-message");

        $domElement = $showMessage->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<show_message><message>some-message</message></show_message>
");
    }

}
