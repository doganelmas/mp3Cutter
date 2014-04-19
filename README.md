mp3Cutter
=========

Mp3 cutter

    <?php require(__DIR__.'/vendor/autoload.php');

    $cutter = new Cutter\FFMpegCutter;
    
    $cutter->setInputFile('testInputFile.mp3')
           ->setBeginTime('20')
           ->setEndTime('15')
           ->setOutputFile('testOutputFile.mp3')
           ->runCommand();
