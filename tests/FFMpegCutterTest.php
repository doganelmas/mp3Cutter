<?php

class FFMpegCutterTest extends PHPUnit_Framework_TestCase {

    public function setUp()
    {
        $this->ffmpegCutter = new Cutter\FFMpegCutter;

        $this->reflection = new ReflectionClass(get_class($this->ffmpegCutter));
    }

    public function testSetInputFile()
    {
        $property = $this->reflection->getProperty('inputFile');
        $property->setAccessible(true);

        $this->ffmpegCutter->setInputFile('testInputFile.mp3');

        $this->assertEquals(
            $property->getValue($this->ffmpegCutter),
            'testInputFile.mp3'
        );
    }

    public function testSetOutputFile()
    {
        $property = $this->reflection->getProperty('outputFile');
        $property->setAccessible(true);

        $this->ffmpegCutter->setOutputFile('testOutputFile.mp3');

        $this->assertEquals(
            $property->getValue($this->ffmpegCutter),
            'testOutputFile.mp3'
        );
    }

    public function testSetSplitBeginTime()
    {
        $property = $this->reflection->getProperty('beginTime');
        $property->setAccessible(true);

        $this->ffmpegCutter->setBeginTime("120");

        $this->assertEquals(
            $property->getValue($this->ffmpegCutter), '120'
        );
    }

    public function testSetSplitEndTime()
    {
        $property = $this->reflection->getProperty('endTime');
        $property->setAccessible(true);

        $this->ffmpegCutter->setEndTime("180");

        $this->assertEquals(
            $property->getValue($this->ffmpegCutter), '180'
        );
    }

    public function testGetCompelementCommand()
    {
        $method = $this->reflection->getMethod('command');
        $method->setAccessible(true);

        $this->ffmpegCutter->setInputFile('testInputFile.mp3')
                            ->setOutputFile('testOutputFile.mp3')
                            ->setBeginTime('20')
                            ->setEndTime('40');

        $this->assertEquals(
            $method->invoke($this->ffmpegCutter),
            'ffmpeg -i testInputFile.mp3 -ss 20 -t 40 testOutputFile.mp3'
        );
    }

}