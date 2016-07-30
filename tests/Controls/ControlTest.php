<?php

use FML\Controls\Control;
use FML\Controls\Label;
use FML\Script\Features\ActionTrigger;
use FML\Script\Features\ControlScript;
use FML\Script\Features\MapInfo;
use FML\Script\Features\PlayerProfile;
use FML\Script\Features\Toggle;
use FML\Script\Features\Tooltip;
use FML\Script\Features\UISound;

class ControlStub extends Control
{

    public function getTagName()
    {
        return "control";
    }

    public function getManiaScriptClass()
    {
        return "CMlControl";
    }

}

class ControlTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $control = ControlStub::create("test.control");

        $this->assertTrue($control instanceof Control);
        $this->assertEquals("test.control", $control->getId());
    }

    public function testX()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getX());

        $this->assertSame($control, $control->setX(13.37));

        $this->assertEquals(13.37, $control->getX());
    }

    public function testY()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getY());

        $this->assertSame($control, $control->setY(13.37));

        $this->assertEquals(13.37, $control->getY());
    }

    public function testZ()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getZ());

        $this->assertSame($control, $control->setZ(13.37));

        $this->assertEquals(13.37, $control->getZ());
    }

    public function testPosition()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getX());
        $this->assertEquals(0., $control->getY());
        $this->assertEquals(0., $control->getZ());

        $this->assertSame($control, $control->setPosition(1.2, 3.4, 5.6));

        $this->assertEquals(1.2, $control->getX());
        $this->assertEquals(3.4, $control->getY());
        $this->assertEquals(5.6, $control->getZ());
    }

    public function testWidth()
    {
        $control = new ControlStub();

        $this->assertEquals(-1., $control->getWidth());

        $this->assertSame($control, $control->setWidth(13.37));

        $this->assertEquals(13.37, $control->getWidth());
    }

    public function testHeight()
    {
        $control = new ControlStub();

        $this->assertEquals(-1., $control->getHeight());

        $this->assertSame($control, $control->setHeight(13.37));

        $this->assertEquals(13.37, $control->getHeight());
    }

    public function testSize()
    {
        $control = new ControlStub();

        $this->assertEquals(-1., $control->getWidth());
        $this->assertEquals(-1., $control->getHeight());

        $this->assertSame($control, $control->setSize(12.34, 56.78));

        $this->assertEquals(12.34, $control->getWidth());
        $this->assertEquals(56.78, $control->getHeight());
    }

    public function testHorizontalAlign()
    {
        $control = new ControlStub();

        $this->assertEquals($control::CENTER, $control->getHorizontalAlign());

        $this->assertSame($control, $control->setHorizontalAlign("test-align"));

        $this->assertEquals("test-align", $control->getHorizontalAlign());
    }

    public function testVerticalAlign()
    {
        $control = new ControlStub();

        $this->assertEquals($control::CENTER2, $control->getVerticalAlign());

        $this->assertSame($control, $control->setVerticalAlign("test-align"));

        $this->assertEquals("test-align", $control->getVerticalAlign());
    }

    public function testAlign()
    {
        $control = new ControlStub();

        $this->assertEquals($control::CENTER, $control->getHorizontalAlign());
        $this->assertEquals($control::CENTER2, $control->getVerticalAlign());

        $this->assertSame($control, $control->setAlign("test-halign", "test-valign"));

        $this->assertEquals("test-halign", $control->getHorizontalAlign());
        $this->assertEquals("test-valign", $control->getVerticalAlign());

        $this->assertSame($control, $control->centerAlign());

        $this->assertEquals($control::CENTER, $control->getHorizontalAlign());
        $this->assertEquals($control::CENTER2, $control->getVerticalAlign());

        $this->assertSame($control, $control->clearAlign());

        $this->assertNull($control->getHorizontalAlign());
        $this->assertNull($control->getVerticalAlign());
    }

    public function testScale()
    {
        $control = new ControlStub();

        $this->assertEquals(1., $control->getScale());

        $this->assertSame($control, $control->setScale(13.37));

        $this->assertEquals(13.37, $control->getScale());
    }

    public function testVisible()
    {
        $control = new ControlStub();

        $this->assertTrue($control->getVisible());

        $this->assertSame($control, $control->setVisible(false));

        $this->assertFalse($control->getVisible());
    }

    public function testRotation()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getRotation());

        $this->assertSame($control, $control->setRotation(13.37));

        $this->assertEquals(13.37, $control->getRotation());
    }

    public function testClasses()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getClasses());

        $this->assertSame($control, $control->addClass("test-class1"));

        $this->assertEquals(array("test-class1"), $control->getClasses());

        $this->assertSame($control, $control->addClasses(array("test-class1", "test-class2")));

        $this->assertEquals(array("test-class1", "test-class2"), $control->getClasses());

        $this->assertSame($control, $control->removeAllClasses());

        $this->assertEmpty($control->getClasses());
    }

    public function testScriptFeatures()
    {
        $control             = new ControlStub();
        $firstScriptFeature  = new Toggle();
        $secondScriptFeature = new Toggle();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addScriptFeature($firstScriptFeature));

        $this->assertEquals(array($firstScriptFeature), $control->getScriptFeatures());

        $this->assertSame($control, $control->addScriptFeature($secondScriptFeature));
        $this->assertSame($control, $control->addScriptFeature($firstScriptFeature));

        $this->assertEquals(array($firstScriptFeature, $secondScriptFeature), $control->getScriptFeatures());

        $this->assertSame($control, $control->removeAllScriptFeatures());

        $this->assertEmpty($control->getScriptFeatures());
    }

    public function testActionTriggerFeature()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addActionTriggerFeature("test-action", "test-label"));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var ActionTrigger $actionTrigger */
        $actionTrigger = $scriptFeatures[0];

        $this->assertTrue($actionTrigger instanceof ActionTrigger);
        $this->assertEquals("test-action", $actionTrigger->getActionName());
        $this->assertSame($control, $actionTrigger->getControl());
        $this->assertEquals("test-label", $actionTrigger->getLabelName());
    }

    public function testMapInfoFeature()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addMapInfoFeature("test-label"));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var MapInfo $mapInfo */
        $mapInfo = $scriptFeatures[0];

        $this->assertTrue($mapInfo instanceof MapInfo);
        $this->assertSame($control, $mapInfo->getControl());
        $this->assertEquals("test-label", $mapInfo->getLabelName());
    }

    public function testPlayerProfileFeature()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addPlayerProfileFeature("test-login", "test-label"));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var PlayerProfile $playerProfile */
        $playerProfile = $scriptFeatures[0];

        $this->assertTrue($playerProfile instanceof PlayerProfile);
        $this->assertEquals("test-login", $playerProfile->getLogin());
        $this->assertSame($control, $playerProfile->getControl());
        $this->assertEquals("test-label", $playerProfile->getLabelName());
    }

    public function testUISoundFeature()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addUISoundFeature("test-sound", 13, "test-label"));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var UISound $uiSound */
        $uiSound = $scriptFeatures[0];

        $this->assertTrue($uiSound instanceof UISound);
        $this->assertEquals("test-sound", $uiSound->getSoundName());
        $this->assertSame($control, $uiSound->getControl());
        $this->assertEquals(13, $uiSound->getVariant());
        $this->assertEquals("test-label", $uiSound->getLabelName());
    }

    public function testToggleFeature()
    {
        $control        = new ControlStub();
        $toggledControl = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addToggleFeature($toggledControl, "test-label", null, true));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var Toggle $toggle */
        $toggle = $scriptFeatures[0];

        $this->assertTrue($toggle instanceof Toggle);
        $this->assertSame($control, $toggle->getTogglingControl());
        $this->assertSame($toggledControl, $toggle->getToggledControl());
        $this->assertNull($toggle->getOnlyShow());
        $this->assertTrue($toggle->getOnlyHide());
    }

    public function testTooltipFeature()
    {
        $control        = new ControlStub();
        $tooltipControl = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addTooltipFeature($tooltipControl, true, true));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var Tooltip $tooltip */
        $tooltip = $scriptFeatures[0];

        $this->assertTrue($tooltip instanceof Tooltip);
        $this->assertSame($control, $tooltip->getHoverControl());
        $this->assertSame($tooltipControl, $tooltip->getTooltipControl());
        $this->assertTrue($tooltip->getStayOnClick());
        $this->assertTrue($tooltip->getInvert());
    }

    public function testTooltipLabelFeature()
    {
        $control      = new ControlStub();
        $tooltipLabel = new Label();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addTooltipLabelFeature($tooltipLabel, "test-tooltip", true, true));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var Tooltip $tooltip */
        $tooltip = $scriptFeatures[0];

        $this->assertTrue($tooltip instanceof Tooltip);
        $this->assertSame($control, $tooltip->getHoverControl());
        $this->assertSame($tooltipLabel, $tooltip->getTooltipControl());
        $this->assertTrue($tooltip->getStayOnClick());
        $this->assertTrue($tooltip->getInvert());
        $this->assertEquals("test-tooltip", $tooltip->getText());
    }

    public function testScriptText()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getScriptFeatures());

        $this->assertSame($control, $control->addScriptText("test-code", "test-label"));

        $scriptFeatures = $control->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var ControlScript $controlScript */
        $controlScript = $scriptFeatures[0];

        $this->assertTrue($controlScript instanceof ControlScript);
        $this->assertSame($control, $controlScript->getControl());
        $this->assertEquals("test-code", $controlScript->getScriptText());
        $this->assertEquals("test-label", $controlScript->getLabelName());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $control     = new ControlStub("some.control");
        $control->clearAlign()
                ->setPosition(9.8, 7.6, 5.4)
                ->setSize(98.76, 54.32)
                ->setAlign("some-halign", "some-valign")
                ->setScale(0.5)
                ->setVisible(false)
                ->setRotation(0.3)
                ->addClasses(array("some-class1", "some-class2"));

        $domElement = $control->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<control id=\"some.control\" posn=\"9.8 7.6 5.4\" sizen=\"98.76 54.32\" halign=\"some-halign\" valign=\"some-valign\" scale=\"0.5\" hidden=\"1\" rot=\"0.3\" class=\"some-class1 some-class2\"/>
", $domDocument->saveXML());
    }

}
