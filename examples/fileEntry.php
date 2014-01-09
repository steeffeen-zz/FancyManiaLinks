<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new \FML\ManiaLink();

// Create file entry element to allow uploading a file
$fileEntry = new \FML\Controls\FileEntry();
$manialink->add($fileEntry);
$fileEntry->setName('inputFile');
// TODO: folder
$fileEntry->setFolder('');

// Add submit button
$submitButton = new \FML\Controls\Quads\Quad_Icons64x64_1();
$manialink->add($submitButton);
$submitButton->setSize(10, 10);
$submitButton->setX(40);
$submitButton->setSubStyle($submitButton::SUBSTYLE_Outbox);
// TODO: $_SERVER variable for url?
$submitButton->setUrl('http://fml.steeffeen.com/examples/fileEntry.php');

// Display information about uploaded file
if (isset($_FILES['inputFile'])) {
	// Get file size and delete file
	$inputFile = $_FILES['inputFile'];
	$fileSize = filesize($inputFile);
	unlink($inputFile);
	
	// Build output label
	$outputLabel = new \FML\Controls\Label();
	$manialink->add($outputLabel);
	$outputLabel->setY(-30);
	$outputLabel->setText("Size of Your uploaded File: {$fileSize} KB");
}

// Print xml
$manialink->render(true);
