<?php

namespace FML\Controls\Quads;

use FML\Controls\Quad;

/**
 * Quad class for style 'UiSMSpectatorScoreBig'
 *
 * @author steeffeen
 */
class Quad_UiSMSpectatorScoreBig extends Quad {
	/**
	 * Constants
	 */
	const STYLE = 'UiSMSpectatorScoreBig';

	/**
	 * Construct UiSMSpectatorScoreBig quad
	 */
	public function __construct() {
		parent::__construct();
		$this->setStyle(self::STYLE);
		array("BotLeft", "BotLeftGlass", "BotRight", "BotRightGlass", "CenterShield", "CenterShieldSmall", "HandleLeft", "HandleRight", 
			"PlayerGlass", "PlayerIconBg", "PlayerJunction", "PlayerSlot", "PlayerSlotCenter", "PlayerSlotRev", "PlayerSlotSmall", 
			"PlayerSlotSmallRev", "TableBgHoriz", "TableBgVert", "Top", "UIRange1Bg", "UIRange2Bg");
	}
}

?>
