<?php
// Namespace
namespace Command;

class Changepassword extends \Library\IRC\Command\Base {

    protected $numberOfArguments = 3;

    public function command() {

        $ircUser = ltrim(current(explode('!', $this->data)), ':');

        if($this->source !== $this->bot->getNick()) { // ensure this is a private message
            $this->say('Command must be sent in private message.');
            return;
        }

        $username = trim($this->arguments[0]);
        $oldPassword = trim($this->arguments[1]);
        $newPassword = trim($this->arguments[2]);

        $result = \MangaApi::changePassword($username, $oldPassword, $newPassword);

        if(!$result['result']) {
            $this->say($result['message'], $ircUser);
        }
        else {
            $this->say('Password has been updated.', $ircUser);
        }
    }

    protected function getHelp() {
        return '/msg '.$this->bot->getNick().' !changepassword username oldpassword newpassword';
    }
}