<?php

use FML\Stylesheet\Mood;
use FML\Stylesheet\SkyGradientKey;

class MoodTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $mood = Mood::create();

        $this->assertTrue($mood instanceof Mood);
    }

    public function testLightAmbientColor()
    {
        $mood = new Mood();

        $this->assertNull($mood->getLightAmbientColor());

        $this->assertSame($mood, $mood->setLightAmbientColor(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getLightAmbientColor());
    }

    public function testCloudsMinimumColor()
    {
        $mood = new Mood();

        $this->assertNull($mood->getCloudsMinimumColor());

        $this->assertSame($mood, $mood->setCloudsMinimumColor(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getCloudsMinimumColor());
    }

    public function testCloudsMaximumColor()
    {
        $mood = new Mood();

        $this->assertNull($mood->getCloudsMaximumColor());

        $this->assertSame($mood, $mood->setCloudsMaximumColor(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getCloudsMaximumColor());
    }

    public function testLight0Color()
    {
        $mood = new Mood();

        $this->assertNull($mood->getLight0Color());

        $this->assertSame($mood, $mood->setLight0Color(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getLight0Color());
    }

    public function testLight0Intensity()
    {
        $mood = new Mood();

        $this->assertEquals(1., $mood->getLight0Intensity());

        $this->assertSame($mood, $mood->setLight0Intensity(13.37));

        $this->assertEquals(13.37, $mood->getLight0Intensity());
    }

    public function testLight0PhiAngle()
    {
        $mood = new Mood();

        $this->assertEquals(0., $mood->getLight0PhiAngle());

        $this->assertSame($mood, $mood->setLight0PhiAngle(13.37));

        $this->assertEquals(13.37, $mood->getLight0PhiAngle());
    }

    public function testLight0ThetaAngle()
    {
        $mood = new Mood();

        $this->assertEquals(0., $mood->getLight0ThetaAngle());

        $this->assertSame($mood, $mood->setLight0ThetaAngle(13.37));

        $this->assertEquals(13.37, $mood->getLight0ThetaAngle());
    }

    public function testLightBallColor()
    {
        $mood = new Mood();

        $this->assertNull($mood->getLightBallColor());

        $this->assertSame($mood, $mood->setLightBallColor(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getLightBallColor());
    }

    public function testLightBallRadius()
    {
        $mood = new Mood();

        $this->assertEquals(0., $mood->getLightBallRadius());

        $this->assertSame($mood, $mood->setLightBallRadius(13.37));

        $this->assertEquals(13.37, $mood->getLightBallRadius());
    }

    public function testFogColor()
    {
        $mood = new Mood();

        $this->assertNull($mood->getFogColor());

        $this->assertSame($mood, $mood->setFogColor(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getFogColor());
    }

    public function testSelfIlluminationColor()
    {
        $mood = new Mood();

        $this->assertNull($mood->getSelfIlluminationColor());

        $this->assertSame($mood, $mood->setSelfIlluminationColor(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $mood->getSelfIlluminationColor());
    }

    public function testSkyGradientScale()
    {
        $mood = new Mood();

        $this->assertEquals(1., $mood->getSkyGradientScale());

        $this->assertSame($mood, $mood->setSkyGradientScale(13.37));

        $this->assertEquals(13.37, $mood->getSkyGradientScale());
    }

    public function testSkyGradientKeys()
    {
        $mood           = new Mood();
        $skyGradientKey = new SkyGradientKey(13, "color");

        $this->assertEmpty($mood->getSkyGradientKeys());

        $this->assertSame($mood, $mood->addSkyGradientKey($skyGradientKey));

        $this->assertEquals(array($skyGradientKey), $mood->getSkyGradientKeys());

        $this->assertSame($mood, $mood->removeAllSkyGradientKeys());

        $this->assertEmpty($mood->getSkyGradientKeys());
    }

    public function testSkyGradient()
    {
        $mood = new Mood();

        $this->assertEmpty($mood->getSkyGradientKeys());

        $this->assertSame($mood, $mood->addSkyGradient(42, "gradient-color"));

        $skyGradientKeys = $mood->getSkyGradientKeys();
        $this->assertCount(1, $skyGradientKeys);

        $skyGradientKey = $skyGradientKeys[0];

        $this->assertTrue($skyGradientKey instanceof SkyGradientKey);
        $this->assertEquals(42., $skyGradientKey->getX());
        $this->assertEquals("gradient-color", $skyGradientKey->getColor());
    }

    public function testRender()
    {
        $mood = new Mood();
        $mood->setLightAmbientColor(9.8, 7.6, 5.4)
             ->setCloudsMinimumColor(8.7, 6.5, 4.3)
             ->setCloudsMaximumColor(7.6, 5.4, 3.2)
             ->setLight0Color(6.5, 4.3, 2.1)
             ->setLight0Intensity(0.5)
             ->setLight0PhiAngle(1.2)
             ->setLight0ThetaAngle(3.4)
             ->setLightBallColor(5.4, 3.2, 1.0)
             ->setLightBallIntensity(1.5)
             ->setLightBallRadius(2.5)
             ->setFogColor(4.3, 2.1, 0.9)
             ->setSelfIlluminationColor(3.2, 1.0, 9.8)
             ->setSkyGradientScale(3.5);

        $domDocument = new \DOMDocument();
        $domElement  = $mood->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<mood LAmbient_LinearRgb=\"9.8 7.6 5.4\" CloudsRgbMinLinear=\"8.7 6.5 4.3\" CloudsRgbMaxLinear=\"7.6 5.4 3.2\" LDir0_LinearRgb=\"6.5 4.3 2.1\" LDir0_Intens=\"0.5\" LDir0_DirPhi=\"1.2\" LDir0_DirTheta=\"3.4\" LBall_LinearRgb=\"5.4 3.2 1\" LBall_Intens=\"1.5\" LBall_Radius=\"2.5\" FogColorSrgb=\"4.3 2.1 0.9\" SelfIllumColor=\"3.2 1 9.8\" SkyGradientV_Scale=\"3.5\"/>
", $domDocument->saveXML());
    }

    public function testRenderWithSkyGradient()
    {
        $mood = new Mood();
        $mood->addSkyGradient(12.34, "test-color")
             ->addSkyGradient(56.78, "other-color");

        $domDocument = new \DOMDocument();
        $domElement  = $mood->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<mood><skygradient><key x=\"12.34\" color=\"test-color\"/><key x=\"56.78\" color=\"other-color\"/></skygradient></mood>
", $domDocument->saveXML());
    }

}
