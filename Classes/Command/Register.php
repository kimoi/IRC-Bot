<?php
// Namespace
namespace Command;

class Register extends \Library\IRC\Command\Base {

    protected $numberOfArguments = 2;

    public function command() {

        $ircUser = ltrim(current(explode('!', $this->data)), ':');

        if($this->source !== $this->bot->getNick()) { // ensure this is a private message
            $this->say('Command must be sent in private message.');
            return;
        }

        $username = trim($this->arguments[0]);
        $pass = trim($this->arguments[1]);

        $result = \MangaApi::registerUser($username, $pass);

        if(!$result['result']) {
            $this->say($result['message'], $ircUser);
        }
        else {
            $this->say('Username and password is now registered', $ircUser);
            $this->say('You may now login at http://manga.madokami.com/', $ircUser);
        }
    }

    protected function getHelp() {
        return '/msg '.$this->bot->getNick().' !register username password';
    }
}