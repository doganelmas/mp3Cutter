<?php namespace Cutter;

class FFMpegCutter extends Cutter implements CutterInterface {

    /**
     * The interface of the command to run.
     *
     * @var string
     */
    protected $command = 'ffmpeg -i %s -ss %s -t %s %s';

    /**
     * Complement the command to run.
     *
     * @return void
     */
    public function command()
    {
        return sprintf(
            $this->command, 
            $this->inputFile, $this->beginTime, $this->endTime, $this->outputFile
        );
    }

}