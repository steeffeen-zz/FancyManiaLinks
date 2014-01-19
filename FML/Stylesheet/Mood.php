<?php

namespace FML\Stylesheet;

// Warning: The mood class isn't fully supported yet!
// Missing attributes: LDir0X, LDir1X, FogColorSrgb, SelfIllumColor, LBall_LinearRgb, LBall_Intens, LBall_Radius

/**
 * Class representing a Stylesheets Mood
 *
 * @author steeffeen
 */
// TODO: missing mood attributes
class Mood {
	/**
	 * Protected Properties
	 */
	protected $tagName = 'mood';
	protected $lightAmbientLinearRgb = '';
	protected $cloudsRgbMinLinear = '';
	protected $cloudsRgbMaxLinear = '';
	protected $skyGradientVScale = 1.;
	protected $skyGradientKeys = array();

	/**
	 * Create a new Mood Object
	 *
	 * @return \FML\Elements\Mood
	 */
	public static function create() {
		$mood = new Mood();
		return $mood;
	}

	/**
	 * Construct a new Mood Object
	 */
	public function __construct() {
	}

	/**
	 * Set Ambient Color in which the Elements reflect the Light
	 *
	 * @param float $red Red Color Value
	 * @param float $green Green Color Value
	 * @param float $blue Blue Color Value
	 * @return \FML\Stylesheet\Mood
	 */
	public function setLightAmbientLinearRgb($red, $green, $blue) {
		$red = (float) $red;
		$green = (float) $green;
		$blue = (float) $blue;
		$this->lightAmbientLinearRgb = "{$red} {$green} {$blue}";
		return $this;
	}

	/**
	 * Set Minimum Value for the Background Color Range
	 *
	 * @param float $red Red Color Value
	 * @param float $green Green Color Value
	 * @param float $blue Blue Color Value
	 * @return \FML\Stylesheet\Mood
	 */
	public function setCloudsRgbMinLinear($red, $green, $blue) {
		$red = (float) $red;
		$green = (float) $green;
		$blue = (float) $blue;
		$this->cloudsRgbMinLinear = "{$red} {$green} {$blue}";
		return $this;
	}

	/**
	 * Set Maximum Value for the Background Color Range
	 *
	 * @param float $red Red Color Value
	 * @param float $green Green Color Value
	 * @param float $blue Blue Color Value
	 * @return \FML\Stylesheet\Mood
	 */
	public function setCloudsRgbMaxLinear($red, $green, $blue) {
		$red = (float) $red;
		$green = (float) $green;
		$blue = (float) $blue;
		$this->cloudsRgbMaxLinear = "{$red} {$green} {$blue}";
		return $this;
	}

	/**
	 * Add a Key for the SkyGradient
	 *
	 * @param float $x Portion Value
	 * @param string $color Gradient Color
	 * @return \FML\Stylesheet\Mood
	 */
	public function addSkyGradientKey($x, $color) {
		$x = (float) $x;
		$color = (string) $color;
		$this->skyGradientKeys[$x] = $color;
		return $this;
	}

	/**
	 * Remove all SkyGradient Keys
	 *
	 * @return \FML\Stylesheet\Mood
	 */
	public function removeSkyGradientKeys() {
		$this->skyGradientKeys = array();
		return $this;
	}

	/**
	 * Render the Mood XML Element
	 *
	 * @param \DOMDocument $domDocument DomDocument for which the Mood XML Element should be rendered
	 * @return \DOMElement
	 */
	public function render(\DOMDocument $domDocument) {
		$moodXml = $domDocument->createElement($this->tagName);
		if ($this->lightAmbientLinearRgb) {
			$moodXml->setAttribute('lambient_linearrgb', $this->lightAmbientLinearRgb);
		}
		if ($this->cloudsRgbMinLinear) {
			$moodXml->setAttribute('cloudsrgbminlinear', $this->cloudsRgbMinLinear);
		}
		if ($this->cloudsRgbMaxLinear) {
			$moodXml->setAttribute('cloudsrgbmaxlinear', $this->cloudsRgbMaxLinear);
		}
		if ($this->skyGradientVScale != 1.) {
			$moodXml->setAttribute('skygradientv_scale', $this->skyGradientVScale);
		}
		if ($this->skyGradientKeys) {
			$skyGradientXml = $domDocument->createElement('skygradient');
			$moodXml->appendChild($skyGradientXml);
			foreach ($this->skyGradientKeys as $x => $color) {
				$keyXml = $domDocument->createElement('key');
				$skyGradientXml->appendChild($keyXml);
				$keyXml->setAttribute('x', $x);
				$keyXml->setAttribute('color', $color);
			}
		}
		return $moodXml;
	}
}
