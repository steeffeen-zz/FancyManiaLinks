<?php

use FML\Controls\Label;
use FML\Script\Features\ControlScript;
use FML\Script\ScriptLabel;

class ControlScriptTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control       = new Label();
        $controlScript = new ControlScript($control, "test-script", "test-label");

        $this->assertSame($control, $controlScript->getControl());
        $this->assertEquals("test-script", $controlScript->getScriptText());
        $this->assertEquals("test-label", $controlScript->getLabelName());
    }

    public function testControl()
    {
        $controlScript = new ControlScript();
        $control       = new Label();

        $this->assertNull($controlScript->getControl());

        $this->assertSame($controlScript, $controlScript->setControl($control));

        $this->assertSame($control, $controlScript->getControl());
        $this->assertEquals(array($controlScript), $control->getScriptFeatures());
    }

    public function testScriptText()
    {
        $controlScript = new ControlScript();

        $this->assertNull($controlScript->getScriptText());

        $this->assertSame($controlScript, $controlScript->setScriptText("some-script"));

        $this->assertEquals("some-script", $controlScript->getScriptText());
    }

    public function testLabelName()
    {
        $controlScript = new ControlScript();

        $this->assertEquals(ScriptLabel::MOUSECLICK, $controlScript->getLabelName());

        $this->assertSame($controlScript, $controlScript->setLabelName("some-label"));

        $this->assertEquals("some-label", $controlScript->getLabelName());
    }

}
