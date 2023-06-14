<?php
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Container
{
    public function twig()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views/');
        $twig = new \Twig\Environment($loader);
        return $twig;
    }

    public static function monolog($text) {

        $log = new Logger('logger');
        $log->pushHandler(new StreamHandler('logs/systems.ini', Level::Warning));


        $log->warning($text);
    }


}


