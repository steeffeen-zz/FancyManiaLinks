<?php

class ExamplesTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @coversNothing
     */
    public function testExamples()
    {
        $examplesDirectory = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "examples" . DIRECTORY_SEPARATOR;
        $files             = scandir($examplesDirectory);

        ob_start();
        foreach ($files as $file) {
            if (stripos($file, ".") === 0) {
                continue;
            }
            $result = include $examplesDirectory . $file;
            $this->assertEquals(1, $result);
        }
        ob_end_clean();
    }

}
