<?php

use FML\Controls\Label;
use FML\Script\Features\ScriptFeature;
use FML\Script\Features\Toggle;

class ScriptFeatureTest extends \PHPUnit_Framework_TestCase
{

    public function testCollect()
    {
        $toggle1 = new Toggle();
        $toggle2 = new Toggle();
        $label   = new Label();
        $label->addScriptFeature($toggle2);

        $this->assertEmpty(ScriptFeature::collect(null));
        $this->assertEquals(array($toggle1), ScriptFeature::collect($toggle1));
        $this->assertEquals(array($toggle2), ScriptFeature::collect($label));
        $this->assertEquals(array($toggle1, $toggle2), ScriptFeature::collect($toggle1, $label));
    }

}
