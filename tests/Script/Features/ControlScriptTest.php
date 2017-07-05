<?php

use FML\Controls\Label;
use FML\Script\Features\ControlScript;
use FML\Script\Script;
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

        $this->assertSame($controlScript, $controlScript->setText("some-script-deprecated"));

        $this->assertEquals("some-script-deprecated", $controlScript->getScriptText());
    }

    public function testLabelName()
    {
        $controlScript = new ControlScript();

        $this->assertEquals(ScriptLabel::MouseClick, $controlScript->getLabelName());

        $this->assertSame($controlScript, $controlScript->setLabelName("some-label"));

        $this->assertEquals("some-label", $controlScript->getLabelName());
    }

    public function testPrepareWithEventLabel()
    {
        $control       = new Label("TestControl");
        $controlScript = new ControlScript($control, "script text", ScriptLabel::MouseClick);
        $script        = new Script();

        $controlScript->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $controlScriptLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::MouseClick, $controlScriptLabel->getName());
        $this->assertEquals("
if (Event.ControlId == \"TestControl\") {
declare Control <=> Event.Control;
declare Label <=> (Control as CMlLabel);
script text
}", $controlScriptLabel->getText());
        $this->assertNull($controlScriptLabel->getIsolated());
    }

    public function testPrepareWithOtherLabel()
    {
        $control       = new Label("TestControl");
        $controlScript = new ControlScript($control, "script text", "label name");
        $script        = new Script();

        $controlScript->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $controlScriptLabel = $genericScriptLabels[0];
        $this->assertEquals("label name", $controlScriptLabel->getName());
        $this->assertEquals("
declare Control <=> Page.GetFirstChild(\"TestControl\");
declare Label <=> (Control as CMlLabel);
script text
", $controlScriptLabel->getText());
        $this->assertTrue($controlScriptLabel->getIsolated());
    }

}
