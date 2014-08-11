<?php
// Namespace
namespace Command;

class Changepassword extends \Library\IRC\Command\Base {

    protected $numberOfArguments = 3;

    public $prefix = null;

    public function command() {
        
        $username = trim($this->arguments[0]);
        $oldPassword = trim($this->arguments[1]);
        $newPassword = trim($this->arguments[2]);

        $result = \MangaApi::changePassword($username, $oldPassword, $newPassword);

        if(!$result['result']) {
            $this->notice($result['message']);
        }
        else {
            $this->notice('Password has been updated.');
        }
    }

    protected function getHelp() {
        return '/msg '.$this->bot->getNick().' CHANGEPASSWORD username oldpassword newpassword';
    }

    protected function validateCommand(array $arguments, $source, $data) {
        if($source !== $this->bot->getNick()) { // ensure this is a private message
            return false; // fail without saying anything
        }

        $ret = parent::validateCommand($arguments, $source, $data);
        return $ret;
    }
}