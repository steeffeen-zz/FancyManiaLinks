<?php

use FML\CustomUI;
use FML\ManiaLink;
use FML\ManiaLinks;

class ManiaLinksTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $maniaLink  = new ManiaLink();
        $maniaLinks = ManiaLinks::create(array($maniaLink));

        $this->assertTrue($maniaLinks instanceof ManiaLinks);
        $this->assertEquals(array($maniaLink), $maniaLinks->getChildren());
    }

    public function testConstruct()
    {
        $maniaLink  = new ManiaLink();
        $maniaLinks = new ManiaLinks(array($maniaLink));

        $this->assertEquals(array($maniaLink), $maniaLinks->getChildren());
    }

    public function testChildren()
    {
        $maniaLinks      = new ManiaLinks();
        $firstManiaLink  = new ManiaLink();
        $secondManiaLink = new ManiaLink();

        $this->assertEmpty($maniaLinks->getChildren());

        $this->assertSame($maniaLinks, $maniaLinks->addChild($firstManiaLink));

        $this->assertEquals(array($firstManiaLink), $maniaLinks->getChildren());

        $this->assertSame($maniaLinks, $maniaLinks->addChild($secondManiaLink));
        $this->assertSame($maniaLinks, $maniaLinks->addChild($firstManiaLink));

        $this->assertEquals(array($firstManiaLink, $secondManiaLink), $maniaLinks->getChildren());

        $this->assertSame($maniaLinks, $maniaLinks->removeAllChildren());

        $this->assertEmpty($maniaLinks->getChildren());
    }

    public function testCustomUI()
    {
        $maniaLinks = new ManiaLinks();
        $customUI   = new CustomUI();

        $this->assertNull($maniaLinks->getCustomUI());

        $this->assertSame($maniaLinks, $maniaLinks->setCustomUI($customUI));

        $this->assertSame($customUI, $maniaLinks->getCustomUI());

        $this->assertSame($maniaLinks, $maniaLinks->setCustomUI(null));

        $this->assertNull($maniaLinks->getCustomUI());
    }

    public function testRender()
    {
        $maniaLinks = new ManiaLinks();
        $maniaLinks->addChild(new ManiaLink());
        $maniaLinks->setCustomUI(new CustomUI());

        $domDocument = $maniaLinks->render();

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<manialinks><manialink version=\"3\"/><custom_ui/></manialinks>
", $domDocument->saveXML());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testRenderWithEcho()
    {
        $maniaLinks = new ManiaLinks();

        $this->expectOutputString("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<manialinks/>
");

        $maniaLinks->render(true);

        // TODO: test Content-Type header
        // $this->assertContains("Content-Type: application/xml; charset=utf-8;", headers_list());
    }

    public function testToString()
    {
        $maniaLinks = new ManiaLinks();

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<manialinks/>
", (string)$maniaLinks);
    }

}
