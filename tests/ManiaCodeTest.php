<?php

use FML\ManiaCode;
use FML\ManiaCode\AddBuddy;
use FML\ManiaCode\AddFavorite;
use FML\ManiaCode\GetSkin;
use FML\ManiaCode\Go_To;
use FML\ManiaCode\InstallMacroblock;
use FML\ManiaCode\InstallMap;
use FML\ManiaCode\InstallPack;
use FML\ManiaCode\InstallReplay;
use FML\ManiaCode\InstallScript;
use FML\ManiaCode\InstallSkin;
use FML\ManiaCode\JoinServer;
use FML\ManiaCode\PlayMap;
use FML\ManiaCode\PlayReplay;
use FML\ManiaCode\ShowMessage;
use FML\ManiaCode\ViewReplay;

class ManiaCodeTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $maniaCode = ManiaCode::create();

        $this->assertTrue($maniaCode instanceof ManiaCode);
    }

    public function testDisableConfirmation()
    {
        $maniaCode = new ManiaCode();

        $this->assertNull($maniaCode->getDisableConfirmation());

        $this->assertSame($maniaCode, $maniaCode->setDisableConfirmation(true));

        $this->assertTrue($maniaCode->getDisableConfirmation());
    }

    public function testShowMessage()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addShowMessage("test-message"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var ShowMessage $showMessage */
        $showMessage = $elements[0];

        $this->assertTrue($showMessage instanceof ShowMessage);
        $this->assertEquals("test-message", $showMessage->getMessage());
    }

    public function testInstallMacroblock()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addInstallMacroblock("test-name", "test.file", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var InstallMacroblock $installMacroblock */
        $installMacroblock = $elements[0];

        $this->assertTrue($installMacroblock instanceof InstallMacroblock);
        $this->assertEquals("test-name", $installMacroblock->getName());
        $this->assertEquals("test.file", $installMacroblock->getFile());
        $this->assertEquals("test.url", $installMacroblock->getUrl());
    }

    public function testInstallMap()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addInstallMap("test-name", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var InstallMap $installMap */
        $installMap = $elements[0];

        $this->assertTrue($installMap instanceof InstallMap);
        $this->assertEquals("test-name", $installMap->getName());
        $this->assertEquals("test.url", $installMap->getUrl());
    }

    public function testPlayMap()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addPlayMap("test-name", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var PlayMap $playMap */
        $playMap = $elements[0];

        $this->assertTrue($playMap instanceof PlayMap);
        $this->assertEquals("test-name", $playMap->getName());
        $this->assertEquals("test.url", $playMap->getUrl());
    }

    public function testInstallReplay()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addInstallReplay("test-name", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var InstallReplay $installReplay */
        $installReplay = $elements[0];

        $this->assertTrue($installReplay instanceof InstallReplay);
        $this->assertEquals("test-name", $installReplay->getName());
        $this->assertEquals("test.url", $installReplay->getUrl());
    }

    public function testViewReplay()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addViewReplay("test-name", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var ViewReplay $viewReplay */
        $viewReplay = $elements[0];

        $this->assertTrue($viewReplay instanceof ViewReplay);
        $this->assertEquals("test-name", $viewReplay->getName());
        $this->assertEquals("test.url", $viewReplay->getUrl());
    }

    public function testPlayReplay()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addPlayReplay("test-name", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var PlayReplay $playReplay */
        $playReplay = $elements[0];

        $this->assertTrue($playReplay instanceof PlayReplay);
        $this->assertEquals("test-name", $playReplay->getName());
        $this->assertEquals("test.url", $playReplay->getUrl());
    }

    public function testInstallSkin()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addInstallSkin("test-name", "test.file", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var InstallSkin $installSkin */
        $installSkin = $elements[0];

        $this->assertTrue($installSkin instanceof InstallSkin);
        $this->assertEquals("test-name", $installSkin->getName());
        $this->assertEquals("test.file", $installSkin->getFile());
        $this->assertEquals("test.url", $installSkin->getUrl());
    }

    public function testGetSkin()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addGetSkin("test-name", "test.file", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var GetSkin $getSkin */
        $getSkin = $elements[0];

        $this->assertTrue($getSkin instanceof GetSkin);
        $this->assertEquals("test-name", $getSkin->getName());
        $this->assertEquals("test.file", $getSkin->getFile());
        $this->assertEquals("test.url", $getSkin->getUrl());
    }

    public function testAddBuddy()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addAddBuddy("test-login"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var AddBuddy $addBuddy */
        $addBuddy = $elements[0];

        $this->assertTrue($addBuddy instanceof AddBuddy);
        $this->assertEquals("test-login", $addBuddy->getLogin());
    }

    public function testGoto()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addGoto("test-link"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var Go_To $goTo */
        $goTo = $elements[0];

        $this->assertTrue($goTo instanceof Go_To);
        $this->assertEquals("test-link", $goTo->getLink());
    }

    public function testJoinServer()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addJoinServer("test-login"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var JoinServer $joinServer */
        $joinServer = $elements[0];

        $this->assertTrue($joinServer instanceof JoinServer);
        $this->assertEquals("test-login", $joinServer->getLogin());
    }

    public function testAddFavorite()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addAddFavorite("test-login"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var AddFavorite $addFavorite */
        $addFavorite = $elements[0];

        $this->assertTrue($addFavorite instanceof AddFavorite);
        $this->assertEquals("test-login", $addFavorite->getLogin());
    }

    public function testInstallScript()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addInstallScript("test-name", "test.file", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var InstallScript $installScript */
        $installScript = $elements[0];

        $this->assertTrue($installScript instanceof InstallScript);
        $this->assertEquals("test-name", $installScript->getName());
        $this->assertEquals("test.file", $installScript->getFile());
        $this->assertEquals("test.url", $installScript->getUrl());
    }

    public function testInstallPack()
    {
        $maniaCode = new ManiaCode();

        $this->assertSame($maniaCode, $maniaCode->addInstallPack("test-name", "test.file", "test.url"));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        /** @var InstallPack $installPack */
        $installPack = $elements[0];

        $this->assertTrue($installPack instanceof InstallPack);
        $this->assertEquals("test-name", $installPack->getName());
        $this->assertEquals("test.file", $installPack->getFile());
        $this->assertEquals("test.url", $installPack->getUrl());
    }

    public function testElements()
    {
        $maniaCode = new ManiaCode();
        $element   = new ShowMessage("some-message");

        $this->assertEmpty($maniaCode->getElements());

        $this->assertSame($maniaCode, $maniaCode->addElement($element));

        $elements = $maniaCode->getElements();

        $this->assertCount(1, $elements);

        $this->assertSame($element, $elements[0]);

        $this->assertSame($maniaCode, $maniaCode->removeAllElements());

        $this->assertEmpty($maniaCode->getElements());
    }

    public function testRender()
    {
        $maniaCode = new ManiaCode();
        $maniaCode->setDisableConfirmation(true)
                  ->addShowMessage("some-message");

        $domDocument = $maniaCode->render();

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<maniacode noconfirmation=\"1\"><show_message><message>some-message</message></show_message></maniacode>
", $domDocument->saveXML());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testRenderWithEcho()
    {
        $maniaCode = new ManiaCode();

        $this->expectOutputString("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<maniacode/>
");

        $maniaCode->render(true);

        // TODO: test Content-Type header
        // $this->assertContains("Content-Type: application/xml; charset=utf-8;", headers_list());
    }

    public function testToString()
    {
        /** @var \DOMDocument $domDocument */
        $domDocument = $this->getMockBuilder("\\DomDocument")
                            ->setMethods(array("saveXML"))
                            ->getMock();
        $domDocument->method("saveXML")
                    ->willReturn("test-string");

        /** @var ManiaCode $maniaCode */
        $maniaCode = $this->getMockBuilder("\\FML\\ManiaCode")
                          ->setMethods(array("render"))
                          ->getMock();
        $maniaCode->method("render")
                  ->willReturn($domDocument);

        $string = (string)$maniaCode;

        $this->assertEquals("test-string", $string);
    }

}
