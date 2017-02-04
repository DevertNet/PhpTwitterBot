<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$jobby = new \Jobby\Jobby();

$jobby->add('PostText', array(
    'closure' => function() {
        require __DIR__ . '/config.php';
        $cron = new Core\Cron\Post();
        echo date('Y-m-d H:i:s').' ';
        echo $cron->run();
        echo "\n";
        return true;
    },
    'schedule' => '30 * * * *',
    'output' => 'logs/PostText.log',
    'enabled' => true,
    'debug' => true,
));

$jobby->run();
