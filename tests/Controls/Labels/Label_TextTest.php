<?php

use FML\Controls\Labels\Label_Text;

class Label_TextTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $labelText = new Label_Text();

        $this->assertNotNull($labelText);
    }

}
