<?php

use FML\Controls\Label;
use FML\Script\Features\Paging;
use FML\Script\Features\PagingButton;
use FML\Script\Features\PagingPage;

class PagingTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $label  = new Label();
        $page   = new PagingPage();
        $button = new PagingButton();
        $paging = new Paging($label, array($page), array($button));

        $this->assertSame($label, $paging->getLabel());
        $this->assertEquals(array($page), $paging->getPages());
        $this->assertEquals(array($button), $paging->getButtons());
    }

    public function testLabel()
    {
        $paging = new Paging();
        $label  = new Label();

        $this->assertNull($paging->getLabel());

        $this->assertSame($paging, $paging->setLabel($label));

        $this->assertSame($label, $paging->getLabel());
        $this->assertNotNull($label->getId());
    }

    public function testAddPageControls()
    {
        $paging  = new Paging();
        $control = new Label();

        $this->assertEmpty($paging->getPages());

        $this->assertSame($paging, $paging->addPageControl($control, 13));

        $pages = $paging->getPages();

        $this->assertCount(1, $pages);

        $page = $pages[0];

        $this->assertTrue($page instanceof PagingPage);
        $this->assertSame($control, $page->getControl());
        $this->assertEquals(13, $page->getPageNumber());

        $this->assertSame($paging, $paging->addPageControl($control));

        $pages = $paging->getPages();

        $this->assertCount(2, $pages);

        $page = $pages[1];

        $this->assertTrue($page instanceof PagingPage);
        $this->assertSame($control, $page->getControl());
        $this->assertEquals(2, $page->getPageNumber());
    }

    public function testAddPages()
    {
        $paging     = new Paging();
        $firstPage  = new PagingPage(new Label());
        $secondPage = new PagingPage(new Label());

        $this->assertEmpty($paging->getPages());

        $this->assertSame($paging, $paging->addPage($firstPage));

        $this->assertCount(1, $paging->getPages());
        $this->assertEquals(array($firstPage), $paging->getPages());

        $this->assertSame($paging, $paging->addPage($secondPage));

        $this->assertCount(2, $paging->getPages());
        $this->assertEquals(array($firstPage, $secondPage), $paging->getPages());

        $this->assertSame($paging, $paging->addPage($firstPage));

        $this->assertCount(2, $paging->getPages());
        $this->assertEquals(array($firstPage, $secondPage), $paging->getPages());
    }

    public function testAddButtonControls()
    {
        $paging  = new Paging();
        $control = new Label();

        $this->assertEmpty($paging->getButtons());

        $this->assertSame($paging, $paging->addButtonControl($control, 13));

        $buttons = $paging->getButtons();

        $this->assertCount(1, $buttons);

        $button = $buttons[0];

        $this->assertTrue($button instanceof PagingButton);
        $this->assertSame($control, $button->getControl());
        $this->assertEquals(13, $button->getPagingCount());

        $this->assertSame($paging, $paging->addButtonControl($control));

        $buttons = $paging->getButtons();

        $this->assertCount(2, $buttons);

        $button = $buttons[1];

        $this->assertTrue($button instanceof PagingButton);
        $this->assertSame($control, $button->getControl());
        $this->assertEquals(-1, $button->getPagingCount());
    }

    public function testAddButtons()
    {
        $paging       = new Paging();
        $firstButton  = new PagingButton(new Label());
        $secondButton = new PagingButton(new Label());

        $this->assertEmpty($paging->getButtons());

        $this->assertSame($paging, $paging->addButton($firstButton));

        $this->assertCount(1, $paging->getButtons());
        $this->assertEquals(array($firstButton), $paging->getButtons());

        $this->assertSame($paging, $paging->addButton($secondButton));

        $this->assertCount(2, $paging->getButtons());
        $this->assertEquals(array($firstButton, $secondButton), $paging->getButtons());

        $this->assertSame($paging, $paging->addButton($firstButton));

        $this->assertCount(2, $paging->getButtons());
        $this->assertEquals(array($firstButton, $secondButton), $paging->getButtons());
    }

    public function testStartPageNumber()
    {
        $paging = new Paging();

        $this->assertNull($paging->getStartPageNumber());

        $this->assertSame($paging, $paging->setStartPageNumber(13));

        $this->assertEquals(13, $paging->getStartPageNumber());
    }

    public function testCustomMaxPageNumber()
    {
        $paging = new Paging();

        $this->assertNull($paging->getCustomMaxPageNumber());

        $this->assertSame($paging, $paging->setCustomMaxPageNumber(13));

        $this->assertEquals(13, $paging->getCustomMaxPageNumber());
    }

    public function testPreviousChunkAction()
    {
        $paging = new Paging();

        $this->assertNull($paging->getPreviousChunkAction());

        $this->assertSame($paging, $paging->setPreviousChunkAction("some-action"));

        $this->assertEquals("some-action", $paging->getPreviousChunkAction());
    }

    public function testNextChunkAction()
    {
        $paging = new Paging();

        $this->assertNull($paging->getNextChunkAction());

        $this->assertSame($paging, $paging->setNextChunkAction("some-action"));

        $this->assertEquals("some-action", $paging->getNextChunkAction());
    }

    public function testChunkActions()
    {
        $paging = new Paging();

        $this->assertNull($paging->getPreviousChunkAction());
        $this->assertNull($paging->getNextChunkAction());

        $this->assertSame($paging, $paging->setChunkActions("other-action"));

        $this->assertEquals("other-action", $paging->getPreviousChunkAction());
        $this->assertEquals("other-action", $paging->getNextChunkAction());
    }

    public function testChunkActionAppendsPageNumber()
    {
        $paging = new Paging();

        $this->assertNull($paging->getChunkActionAppendsPageNumber());

        $this->assertSame($paging, $paging->setChunkActionAppendsPageNumber(true));

        $this->assertTrue($paging->getChunkActionAppendsPageNumber());
    }

}
