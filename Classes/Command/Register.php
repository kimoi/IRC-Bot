<?php
// Namespace
namespace Command;

class Register extends \Library\IRC\Command\Base {

    protected $numberOfArguments = 2;

    public $prefix = null;

    public function command() {
        global $config;

        $username = trim($this->arguments[0]);
        $pass = trim($this->arguments[1]);

        $url = $config['mangaApi'].'register?'.http_build_query(array('username' => $username, 'password' => $pass));
        $result = json_decode(file_get_contents($url));

        if(!$result) {
            $this->notice('A server-side error occured');
        }
        elseif(!$result->result) {
            $this->notice($result->message);
        }
        else {
            $this->notice('Username and password is now registered');
            $this->notice('You may now login at https://manga.madokami.com/');
        }
    }

    protected function getHelp() {
        return '/msg '.$this->bot->getNick().' REGISTER username password';
    }

    protected function validateCommand(array $arguments, $source, $data) {
        if($source !== $this->bot->getNick()) { // ensure this is a private message
            return false; // fail without saying anything
        }

        $ret = parent::validateCommand($arguments, $source, $data);
        return $ret;
    }
}
