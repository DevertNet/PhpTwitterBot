<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/config.php';
require __DIR__ . '/vendor/autoload.php';



$cron = new Core\Cron\Post();
echo $cron->run();

var_dump($cron->getLastTweets());

die;

use Makotokw\Twient\Twitter;


$twitter = new Twitter();
$twitter->oAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);
$statuses = $twitter->call('statuses/home_timeline');
foreach ($statuses as $status) {
    echo $status['user']['name'].': '.$status['text'].PHP_EOL;
}

$statuses = $twitter->call('statuses/home_timeline');
foreach ($statuses as $status) {
    echo $status['user']['name'].': '.$status['text'].PHP_EOL;
}

echo '<hr>';


$statuses = $twitter->call('statuses/user_timeline', array('screen_name' => 'imises'));
foreach ($statuses as $status) {
    echo $status['user']['name'].': '.$status['text'].PHP_EOL;
}


//$twitter->call('statuses/update', array('status' => 'Hello World!'));