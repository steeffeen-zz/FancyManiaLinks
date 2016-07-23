<?php

use FML\Elements\Dico;

class DicoTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $dico = Dico::create();

        $this->assertTrue($dico instanceof Dico);
    }

    public function testEntries()
    {
        $dico = new Dico();

        $this->assertNull($dico->getEntry("lang1", "entry1"));
        $this->assertNull($dico->getEntry("lang2", "entry2"));
        $this->assertNull($dico->getEntry("lang3", "entry3"));

        $this->assertSame($dico, $dico->setEntry("lang1", "entry1", "value1"));
        $this->assertSame($dico, $dico->setEntry("lang2", "entry2", "value2"));
        $this->assertSame($dico, $dico->setEntry("lang3", "entry3", "value3"));

        $this->assertEquals("value1", $dico->getEntry("lang1", "entry1"));
        $this->assertEquals("value2", $dico->getEntry("lang2", "entry2"));
        $this->assertEquals("value3", $dico->getEntry("lang3", "entry3"));

        $this->assertSame($dico, $dico->removeLanguage("lang1"));

        $this->assertNull($dico->getEntry("lang1", "entry1"));
        $this->assertEquals("value2", $dico->getEntry("lang2", "entry2"));
        $this->assertEquals("value3", $dico->getEntry("lang3", "entry3"));

        $this->assertSame($dico, $dico->setEntry("lang1", "entry1", "value1"));
        $this->assertSame($dico, $dico->removeEntry("entry2"));

        $this->assertEquals("value1", $dico->getEntry("lang1", "entry1"));
        $this->assertNull($dico->getEntry("lang2", "entry2"));
        $this->assertEquals("value3", $dico->getEntry("lang3", "entry3"));

        $this->assertSame($dico, $dico->setEntry("lang2", "entry2", "value2"));
        $this->assertSame($dico, $dico->removeAllEntries());

        $this->assertNull($dico->getEntry("lang1", "entry1"));
        $this->assertNull($dico->getEntry("lang2", "entry2"));
        $this->assertNull($dico->getEntry("lang3", "entry3"));
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $dico        = new Dico();
        $dico->setEntry("L1", "E1", "V1")
             ->setEntry("L2", "E2", "V2")
             ->setEntry("L3", "E3", "V3");

        $domElement = $dico->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<dico><language id=\"L1\"><E1>V1</E1></language><language id=\"L2\"><E2>V2</E2></language><language id=\"L3\"><E3>V3</E3></language></dico>
", $domDocument->saveXML());
    }

}
