<?php

namespace FML\Controls\Labels;

use FML\Controls\Label;

/**
 * Label class for text styles
 *
 * @author steeffeen
 */
class Label_Text extends Label {
	/**
	 * Constants
	 */
	const STYLE = '';

	/**
	 * Construct text label
	 */
	public function __construct() {
		parent::__construct();
		array("AvatarButtonNormal", "BgMainMenuTitleHeader", "Default", "FrameTransitionFromLeft", "FrameTransitionsFromRight", 
			"ListItemMedal", "Manialink_Body", "ProgressBar", "ProgressBarSmall ", "SliderSmall", "SliderVolume", 
			"StyleTextScriptEditor", "StyleValueYellowSmall", "TextActionMaker", "TextButtonBig", "TextButtonMedium", "TextButtonNav", 
			"TextButtonNavBack", "TextButtonSmall", "TextCardInfoSmall", "TextCardInfoVerySmall", "TextCardMedium", "TextCardRaceRank", 
			"TextCardScores2", "TextCardSmall", "TextCardSmallScores2", "TextCardSmallScores2Rank", "TextChallengeNameMedal", 
			"TextChallengeNameMedalNone", "TextChallengeNameMedium", "TextChallengeNameSmall", "TextCongratsBig", "TextCredits", 
			"TextCreditsTitle", "TextEditorArticle", "TextInfoMedium", "TextInfoSmall", "TextPlayerCardName", "TextPlayerCardScore", 
			"TextPlayerCardScore", "TextRaceChat", "TextRaceChrono", "TextRaceChronoError", "TextRaceChronoOfficial", 
			"TextRaceChronoWarning", "TextRaceMessage", "TextRaceMessageBig", "TextRaceStaticSmall", "TextRaceValueSmall", 
			"TextRankingsBig", "TextSPScoreBig", "TextSPScoreMedium", "TextSPScoreSmall", "TextStaticMedium", "TextStaticSmall", 
			"TextStaticVerySmall", "TextSubTitle1", "TextSubTitle2", "TextTips", "TextTitle1", "TextTitle2", "TextTitle2Blink", 
			"TextTitle3", "TextTitle3Header", "TextTitleError", "TextValueBig", "TextValueMedium", "TextValueSmall", "TextValueSmallSm", 
			"TrackerText", "TrackerTextBig", "TrackListItem", "TrackListLine", "UiDriving_BgBottom", "UiDriving_BgCard", 
			"UiDriving_BgCenter");
	}
}

?>
