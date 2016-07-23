<?php

use FML\Controls\Labels\Label_Button;

class Label_ButtonTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $labelButton = new Label_Button();

        $this->assertNotNull($labelButton);
    }

}
