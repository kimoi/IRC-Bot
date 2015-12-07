<?php
// Namespace
namespace Command;

class Help extends \Library\IRC\Command\Base {

    protected $numberOfArguments = -1;

    public function command() {
        $this->say('https://manga.madokami.com/ requires registration');
        $this->say('Use the commands below to register, or update your password.');

        $commands = $this->bot->getCommands();
        foreach($commands as $command) {
            $this->say($command->getHelp());
        }
    }
}
?>