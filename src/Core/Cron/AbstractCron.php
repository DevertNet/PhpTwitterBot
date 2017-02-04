<?php
namespace Core\Cron;

class AbstractCron
{
    public $_twitter_service;
    
    public function getTwitterService()
    {
        if(!$this->_twitter_service)
        {
            $this->_twitter_service = new \Core\Twitter\Service();
            $this->_twitter_service->oAuth(CONFIG_CONSUMER_KEY, CONFIG_CONSUMER_SECRET, CONFIG_OAUTH_TOKEN, CONFIG_OAUTH_SECRET);
        }

        return $this->_twitter_service;
    }
    
    public function removeHashTags($text)
    {
        return preg_replace('/#\S+ */', '', $text);
    }
    
    public function getRecentTweets()
    {
        return $this->getTwitterService()->getRecentTweets();
    }
}