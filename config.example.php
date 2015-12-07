<?php
return array(
    'server'   => 'irc.rizon.net',
    'port'     => 6667,
    'name'     => 'madokamibot',
    'nick'     => 'madokamibot',
    'nickPassword' => 'nickpw',
    'channels' => array(
        '#madokamisandbox',
        '#madokami',
        '#fufufu',
    ),
    'max_reconnects' => 1,
    'log_file'       => 'log-',
    'commands'       => array(
        'Command\Register'    => array(),
        'Command\Changepassword'    => array(),
    ),
    'listeners' => array(
        'Listener\Identify' => array()
    ),
    'mangaApi' => 'https://username:password@manga.madokami.com/api/'
);
