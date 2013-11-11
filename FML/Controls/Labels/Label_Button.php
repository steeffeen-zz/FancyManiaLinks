<?php

namespace FML\Controls\Labels;

use FML\Controls\Label;

/**
 * Label class for button styles
 *
 * @author steeffeen
 */
class Label_Button extends Label {
	/**
	 * Constants
	 */
	const STYLE = '';

	/**
	 * Construct button label
	 */
	public function __construct() {
		parent::__construct();
		array("CardButtonMedium", "CardButtonMediumL", "CardButtonMediumS", "CardButtonMediumWide", "CardButtonMediumXL", 
			"CardButtonMediumXS", "CardButtonMediumXXL", "CardButtonMediumXXXL", "CardButtonSmall", "CardButtonSmallL", 
			"CardButtonSmallS", "CardButtonSmallWide", "CardButtonSmallXL", "CardButtonSmallXS", "CardButtonSmallXXL", 
			"CardButtonSmallXXXL", "CardMain_Quit", "CardMain_Tool");
	}
}

?>
