<?php
// Namespace
namespace Listener;

class Identify extends \Library\IRC\Listener\Base {
    
    public function execute($data) {
        if(strpos($data, 'This nickname is registered and protected.') > 0) {
            $this->bot->sendDataToServer('PRIVMSG nickserv :identify '.$this->bot->getNickPassword());
        }
    }

    public function getKeywords() {
        return array("NOTICE");
    }
}
