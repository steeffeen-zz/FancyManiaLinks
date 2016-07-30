<?php

use FML\Controls\Label;
use FML\Script\Features\PagingButton;

class PagingButtonTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control      = new Label();
        $pagingButton = new PagingButton($control, 13);

        $this->assertSame($control, $pagingButton->getControl());
        $this->assertEquals(13, $pagingButton->getPagingCount());
    }

    public function testControl()
    {
        $pagingButton = new PagingButton();
        $control      = new Label();

        $this->assertNull($pagingButton->getControl());

        $this->assertSame($pagingButton, $pagingButton->setControl($control));

        $this->assertSame($control, $pagingButton->getControl());
    }

    public function testPagingCount()
    {
        $pagingButton = new PagingButton();

        $this->assertEquals(1, $pagingButton->getPagingCount());

        $this->assertSame($pagingButton, $pagingButton->setPagingCount(42));

        $this->assertEquals(42, $pagingButton->getPagingCount());
    }

}
