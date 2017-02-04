<?php
namespace Core\Cron;

class Post extends AbstractCron
{
    public $_last_tweets = array();
    
    public function run()
    {
        try {
            $status = $this->getNextUnqiueText();
            $this->getTwitterService()->getApi()->call('statuses/update', array('status' => $status));
            
            return $status;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function getNextUnqiueText()
    {
        $tweets = $this->getLastTweets();
        $text = $this->getRandomText();
        
        while(in_array($text, $tweets))
        {
            $text = $this->getRandomText();
        }
        
        return $text;
    }
    
    public function getLastTweets()
    {
        /* DEBUG
        return array (
          0 => 'Hello World!',
          1 => 'RT @DevertNet: Awesome parallaxe logo effect https://t.co/Ac0Ethwc7d ',
          2 => 'RT @DevertNet: Stunning sticky buttons effect! http://t.co/9glYG0gdhe ',
          3 => 'RT @VereefYT: Alter!
        Mediakraft möchte sich diesbezüglich noch äußern @unge
        Wird ja immer cooler, hehe. http://t.co/Ci7C7oDN5f',
          4 => 'RT @DevertNet: Only 10$: Devert AdvancedLoopSelection Plugin http://t.co/5fYE90lRP5 via @DevertNet',
          5 => 'Tomate, Morzarella, Balsamicocreme http://t.co/uM1QmGW6Lq',
          6 => 'GTA mit @LilaKrokodil zocken :D',
          7 => '@LilaKrokodil Yay! :)',
        );
        */
        
        if(!$this->_last_tweets)
        {
            $tweets = $this->getRecentTweets();
        
            foreach($tweets as $tweet)
            {
                $this->_last_tweets[] = trim($this->removeHashTags($tweet['text']));
                if(count($this->_last_tweets)==10) break;
            }
        }
        
        return $this->_last_tweets;
    }
    
    public function getRandomText()
    {
        /* DEBUG
        $x = array (
          0 => 'Hello World! a',
          1 => 'RT @DevertNet: Awesome parallaxe logo effect https://t.co/Ac0Ethwc7d ',
          2 => 'RT @DevertNet: Stunning sticky buttons effect! http://t.co/9glYG0gdhe ',
          3 => 'RT @VereefYT: aAlter!
        Mediakraft möchte sich diesbezüglich noch äußern @unge
        Wird ja immer cooler, hehe. http://t.co/Ci7C7oDN5f',
          4 => 'RT @DevertNet: Only 10$: Devert AdvancedLoopSelection Plugin http://t.co/5fYE90lRP5 via @DevertNet',
          5 => 'Tomate, Morzarella, Balsamicocreme http://t.co/uM1QmGW6Lq',
          6 => 'GTA mit @LilaKrokodil zocken :D',
          7 => '@LilaKrokodil Yay! :)',
        );
        return $x[array_rand($x)];
        */
        
        $generate = new \Core\Generate\Text();
        return $generate->getText();
    }
    

}