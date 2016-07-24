<?php

use FML\Script\Features\KeyAction;

class KeyActionTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $keyAction = new KeyAction("test-action", "test-key");

        $this->assertEquals("test-action", $keyAction->getActionName());
        $this->assertEquals("test-key", $keyAction->getKeyName());
    }

    public function testActionName()
    {
        $keyAction = new KeyAction();

        $this->assertNull($keyAction->getActionName());

        $this->assertSame($keyAction, $keyAction->setActionName("some-action"));

        $this->assertEquals("some-action", $keyAction->getActionName());
    }

    public function testKeys()
    {
        $keyAction = new KeyAction();

        $this->assertNull($keyAction->getKeyName());
        $this->assertNull($keyAction->getKeyCode());
        $this->assertNull($keyAction->getCharPressed());

        $this->assertSame($keyAction, $keyAction->setKeyName("some-key"));

        $this->assertEquals("some-key", $keyAction->getKeyName());
        $this->assertNull($keyAction->getKeyCode());
        $this->assertNull($keyAction->getCharPressed());

        $this->assertSame($keyAction, $keyAction->setKeyCode(42));

        $this->assertNull($keyAction->getKeyName());
        $this->assertEquals(42, $keyAction->getKeyCode());
        $this->assertNull($keyAction->getCharPressed());

        $this->assertSame($keyAction, $keyAction->setCharPressed("some-char"));

        $this->assertNull($keyAction->getKeyName());
        $this->assertNull($keyAction->getKeyCode());
        $this->assertEquals("some-char", $keyAction->getCharPressed());
    }

}
