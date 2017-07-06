<?php

use FML\Controls\Entry;
use FML\Script\Features\EntrySubmit;
use FML\Script\Script;
use FML\Script\ScriptLabel;

class EntrySubmitTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $entry       = new Entry();
        $entrySubmit = new EntrySubmit($entry, "test.url");

        $this->assertSame($entry, $entrySubmit->getEntry());
        $this->assertEquals("test.url", $entrySubmit->getUrl());
    }

    public function testEntry()
    {
        $entrySubmit = new EntrySubmit();
        $entry       = new Entry();

        $this->assertNull($entrySubmit->getEntry());

        $this->assertSame($entrySubmit, $entrySubmit->setEntry($entry));

        $this->assertSame($entry, $entrySubmit->getEntry());
    }

    public function testUrl()
    {
        $entrySubmit = new EntrySubmit();

        $this->assertNull($entrySubmit->getUrl());

        $this->assertSame($entrySubmit, $entrySubmit->setUrl("some.url"));

        $this->assertEquals("some.url", $entrySubmit->getUrl());
    }

    public function testPrepare()
    {
        $entry       = new Entry();
        $entrySubmit = new EntrySubmit($entry);
        $script      = new Script();

        $entrySubmit->prepare($script);

        $scriptIncludes = $script->getScriptIncludes();
        $this->assertNotEmpty($scriptIncludes);
        $scriptInclude = $scriptIncludes["TextLib"];
        $this->assertEquals("TextLib", $scriptInclude->getFile());
        $this->assertEquals("TextLib", $scriptInclude->getNamespace());

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $entrySubmitLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::EntrySubmit, $entrySubmitLabel->getName());
        $this->assertNotNull($entrySubmitLabel->getText());
    }

}
