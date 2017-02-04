<?php
namespace Core\Twitter;

class Service
{
    public $_api;
    
    public function getApi() {
        if(!$this->_api)
        {
           $this->_api = new \Makotokw\Twient\Twitter(); 
        }
        
        return $this->_api;
   }
    
    public function oAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret)
    {
        return $this->getApi()->oAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);
    }
    
    public function getRecentTweets()
    {
        $return = array();
        
        $statuses = $this->getApi()->call('statuses/user_timeline');
        foreach ($statuses as $status) {
            $return[] = array(
                'name' => $status['user']['name'],
                'text' => $status['text'],
                //'raw'  => $status,
            );
        }
        
        return $return;
    }
}