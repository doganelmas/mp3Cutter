<?php namespace Cutter;

abstract class Cutter {

    /**
     * Input file name.
     *
     * @var string
     */
    protected $inputFile;

    /**
     * Output file name.
     *
     * @var string
     */
    protected $outputFile;

    /**
     * Split begin time.
     *
     * @var string
     */
    protected $beginTime;

    /**
     * Split end time.
     *
     * @var string
     */
    protected $endTime;

    /**
     * Set a new input file name.
     *
     * @param  string  $path
     * @return Cutter\Cutter;
     */
    public function setInputFile($path)
    {
        $this->inputFile = $path;

        return $this;
    }

    /**
     * Set a new output file name.
     *
     * @param  string  $path
     * @return Cutter\Cutter
     */
    public function setOutputFile($path)
    {
        $this->outputFile = $path;

        return $this;
    }

    /**
     * Set a new begin time for split proccessing.
     *
     * @param  string  $time
     * @return Cutter\Cutter
     */
    public function setBeginTime($time)
    {
        $this->beginTime = $time;

        return $this;
    }

    /**
     * Set a new end time for split proccessing.
     *
     * @param  string  $time
     * @return Cutter\Cutter
     */
    public function setEndTime($time)
    {
        $this->endTime = $time;

        return $this;
    }

    /**
     * Run the command.
     *
     * @return bool|array
     */
    public function runCommand()
    {
        if ($this->isValidArguments())
        {
            exec($this->command(), $output, $exitCode);

            return $exitCode == 0 ? true : $output;
        }
    }

    /**
     * Validates the entered value.
     *
     * @return void
     */
    protected function isValidArguments()
    {
        if (empty($this->inputFile))
            throw new MissingArgumentException("Input file is required.");

        if (empty($this->outputFile))
            throw new MissingArgumentException("Output file is required.");

        if (empty($this->beginTime))
            throw new MissingArgumentException("Begin time is required.");

        if (empty($this->endTime))
            throw new MissingArgumentException("End time is required.");

        return true;
    }

}