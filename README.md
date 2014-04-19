mp3Cutter
=========

Mp3 cutter

    <?php require(__DIR__.'/vendor/autoload.php');

    $cutter = new Cutter\FFMpegCutter;
    
    $cutter->setInputFile('hoscakal.mp3')
           ->setBeginTime('20')
           ->setEndTime('15')
           ->setOutputFile('hoscakal_20_15.mp3')
           ->runCommand();
