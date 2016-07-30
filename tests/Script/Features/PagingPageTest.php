<?php

use FML\Controls\Label;
use FML\Script\Features\PagingPage;

class PagingPageTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control    = new Label();
        $pagingPage = new PagingPage($control, 13);

        $this->assertSame($control, $pagingPage->getControl());
        $this->assertEquals(13, $pagingPage->getPageNumber());
    }

    public function testControl()
    {
        $pagingPage = new PagingPage();
        $control    = new Label();

        $this->assertNull($pagingPage->getControl());

        $this->assertSame($pagingPage, $pagingPage->setControl($control));

        $this->assertSame($control, $pagingPage->getControl());
    }

    public function testPagingNumber()
    {
        $pagingPage = new PagingPage();

        $this->assertNull($pagingPage->getPageNumber());

        $this->assertSame($pagingPage, $pagingPage->setPageNumber(42));

        $this->assertEquals(42, $pagingPage->getPageNumber());
    }

}
