<?php

use FML\Script\Script;
use FML\Script\ScriptConstant;
use FML\Script\ScriptFunction;
use FML\Script\ScriptInclude;
use FML\Script\ScriptLabel;

class ScriptTest extends \PHPUnit_Framework_TestCase
{

    public function testScriptIncludePlain()
    {
        $script = new Script();

        $script->setScriptInclude("test.file", "test_namespace");

        $scriptIncludes = $script->getScriptIncludes();
        $this->assertNotEmpty($scriptIncludes);
        $scriptInclude = $scriptIncludes["test_namespace"];
        $this->assertTrue($scriptInclude instanceof ScriptInclude);
        $this->assertEquals("test.file", $scriptInclude->getFile());
        $this->assertEquals("test_namespace", $scriptInclude->getNamespace());
    }

    public function testScriptIncludeObject()
    {
        $script        = new Script();
        $scriptInclude = new ScriptInclude("test.file", "test_namespace");

        $script->setScriptInclude($scriptInclude);

        $scriptIncludes = $script->getScriptIncludes();
        $this->assertNotEmpty($scriptIncludes);
        $this->assertSame($scriptInclude, $scriptIncludes["test_namespace"]);
    }

    public function testScriptConstantPlain()
    {
        $script = new Script();

        $script->addScriptConstant("test_name", "test.value");

        $scriptConstants = $script->getScriptConstants();
        $this->assertNotEmpty($scriptConstants);
        $scriptConstant = $scriptConstants[0];
        $this->assertTrue($scriptConstant instanceof ScriptConstant);
        $this->assertEquals("test_name", $scriptConstant->getName());
        $this->assertEquals("test.value", $scriptConstant->getValue());
    }

    public function testScriptConstantObject()
    {
        $script         = new Script();
        $scriptConstant = new ScriptConstant("test_name", "test_namespace");

        $script->addScriptConstant($scriptConstant);

        $scriptConstants = $script->getScriptConstants();
        $this->assertNotEmpty($scriptConstants);
        $this->assertSame($scriptConstant, $scriptConstants[0]);
    }

    public function testScriptFunctionPlain()
    {
        $script = new Script();

        $script->addScriptFunction("test_name", "test text");

        $scriptFunctions = $script->getScriptFunctions();
        $this->assertNotEmpty($scriptFunctions);
        $scriptFunction = $scriptFunctions[0];
        $this->assertTrue($scriptFunction instanceof ScriptFunction);
        $this->assertEquals("test_name", $scriptFunction->getName());
        $this->assertEquals("test text", $scriptFunction->getText());
    }

    public function testScriptFunctionObject()
    {
        $script         = new Script();
        $scriptFunction = new ScriptFunction("test_name", "test text");

        $script->addScriptFunction($scriptFunction);

        $scriptFunctions = $script->getScriptFunctions();
        $this->assertNotEmpty($scriptFunctions);
        $this->assertSame($scriptFunction, $scriptFunctions[0]);
    }

    public function testGenericScriptLabelPlain()
    {
        $script = new Script();

        $script->appendGenericScriptLabel("test_name", "test text");

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $genericScriptLabel = $genericScriptLabels[0];
        $this->assertTrue($genericScriptLabel instanceof ScriptLabel);
        $this->assertEquals("test_name", $genericScriptLabel->getName());
        $this->assertEquals("test text", $genericScriptLabel->getText());

        $script->resetGenericScriptLabels();

        $this->assertEmpty($script->getGenericScriptLabels());
    }

    public function testGenericScriptLabelObject()
    {
        $script             = new Script();
        $genericScriptLabel = new ScriptLabel("test_name", "test text");

        $script->appendGenericScriptLabel($genericScriptLabel);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $this->assertSame($genericScriptLabel, $genericScriptLabels[0]);

        $script->resetGenericScriptLabels();

        $this->assertEmpty($script->getGenericScriptLabels());
    }

}
