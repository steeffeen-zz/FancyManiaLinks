<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create file entry element to allow uploading a screenshot file
$fileEntry = new \FML\Controls\FileEntry();
$maniaLink->add($fileEntry);
$fileEntry->setSize(50, 7);
$fileEntry->setName('inputFile');
$fileEntry->setFolder('ScreenShots');

// Add submit button
$submitButton = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->add($submitButton);
$submitButton->setSize(10, 10);
$submitButton->setX(40);
$submitButton->setSubStyle($submitButton::SUBSTYLE_Outbox);
$submitButton->setManialink('POST(' . $_SERVER['SCRIPT_URI'] . '?filename=inputFile,inputFile)');

// Display information about uploaded file
if (!empty($_GET['filename'])) {
	// Get content of uploaded file
	$inputFile = file_get_contents('php://input');
	if ($inputFile) {
		// Temporarily save file, determine size and delete it
		$fileUrl = 'temp_inputFile';
		file_put_contents($fileUrl, $inputFile);
		$fileSize = round(filesize($fileUrl) / 1024., 2);
		unlink($fileUrl);
		
		// Build output labels showing file name and size
		$nameLabel = new \FML\Controls\Label();
		$maniaLink->add($nameLabel);
		$nameLabel->setPosition(-20, -22);
		$nameLabel->setHAlign('left');
		$nameLabel->setText('File Name: ' . $_GET['filename']);
		
		$sizeLabel = new \FML\Controls\Label();
		$maniaLink->add($sizeLabel);
		$sizeLabel->setPosition(-20, -30);
		$sizeLabel->setHAlign('left');
		$sizeLabel->setText("File Size: {$fileSize} KB");
	}
}

// Print xml
$maniaLink->render(true);
