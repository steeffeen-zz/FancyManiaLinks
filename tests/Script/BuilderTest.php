<?php

use FML\Controls\Label;
use FML\Script\Builder;

class BuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testLabelImplementationBlock()
    {
        $this->assertEquals("
***test-label***
***if(True){test-code}***
", Builder::getLabelImplementationBlock("test-label", "test-code", true));

        $this->assertEquals("
***other-label***
***other-code***
", Builder::getLabelImplementationBlock("other-label", "other-code", false));
    }

    public function testEscapeText()
    {
        $this->assertEquals("\"some text\"", Builder::escapeText("some text"));
        $this->assertEquals("some text", Builder::escapeText("some text", false));
        $this->assertEquals("\"other\\\"text\"", Builder::escapeText("other\"text"));
    }

    public function testId()
    {
        $this->assertEquals("test.id", Builder::getId(new Label("test.id")));
        $this->assertEquals("other\\\"id", Builder::getId(new Label("other\"id")));
    }

    public function testReal()
    {
        $this->assertEquals("13.42", Builder::getReal(13.42));
        $this->assertEquals("2.0", Builder::getReal(2.));
        $this->assertEquals("0.6", Builder::getReal(.6));
        $this->assertEquals("-13.37", Builder::getReal(-13.37));
    }

    public function testBoolean()
    {
        $this->assertEquals("True", Builder::getBoolean(true));
        $this->assertEquals("False", Builder::getBoolean(false));
    }

    public function testVec2()
    {
        $this->assertEquals("<0.,0.>", Builder::getVec2(array()));
        $this->assertEquals("<1.,2.>", Builder::getVec2(array(1., 2.)));
        $this->assertEquals("<3.,4.>", Builder::getVec2(3., 4.));
        $this->assertEquals("<5.,0.>", Builder::getVec2(5.));
    }

    public function testVec3()
    {
        $this->assertEquals("<0.,0.,0.>", Builder::getVec3(array()));
        $this->assertEquals("<1.,2.,3.>", Builder::getVec3(array(1., 2., 3.)));
        $this->assertEquals("<4.,5.,6.>", Builder::getVec3(4., 5., 6.));
        $this->assertEquals("<7.,8.,0.>", Builder::getVec3(7., 8.));
        $this->assertEquals("<9.,0.,0.>", Builder::getVec3(9.));
    }

    public function testArray()
    {
        $this->assertEquals("[\"a\", \"b\", \"c\"]", Builder::getArray(array("a", "b", "c")));
        $this->assertEquals("[1, 2, 3]", Builder::getArray(array("a" => 1, "b" => 2, "c" => 3)));
        $this->assertEquals("[-1, -2, -3]", Builder::getArray(array(-1, -2, -3)));
        $this->assertEquals("[1.2, 3.4, 5.6]", Builder::getArray(array(1.2, 3.4, 5.6)));
    }

    public function testArrayAssociative()
    {
        $this->assertEquals("[0 => \"a\", 1 => \"b\", 2 => \"c\"]", Builder::getArray(array("a", "b", "c"), true));
        $this->assertEquals("[\"a\" => 1, \"b\" => 2, \"c\" => 3]", Builder::getArray(array("a" => 1, "b" => 2, "c" => 3), true));
        $this->assertEquals("[0 => -1, 1 => -2, 2 => -3]", Builder::getArray(array(-1, -2, -3), true));
        $this->assertEquals("[0 => 1.2, 1 => 3.4, 2 => 5.6]", Builder::getArray(array(1.2, 3.4, 5.6), true));
    }

    public function testInclude()
    {
        $this->assertEquals("#Include	\"TestLib\"	as TestLib
", Builder::getInclude("TestLib"));

        $this->assertEquals("#Include	\"TestFile.Script.txt\"
", Builder::getInclude("TestFile.Script.txt"));
        $this->assertEquals("#Include	\"OtherFile.Script.txt\"	as SomeNamespace
", Builder::getInclude("OtherFile.Script.txt", "SomeNamespace"));
    }

    public function testConstant()
    {
        $this->assertEquals("#Const	TestConstant	True
", Builder::getConstant("TestConstant", true));
        $this->assertEquals("#Const	SomeConstant	1.3
", Builder::getConstant("SomeConstant", 1.3));
        $this->assertEquals("#Const	OtherConstant	\"other-value\"
", Builder::getConstant("OtherConstant", "other-value"));
    }

}
