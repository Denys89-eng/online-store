<?php


class Error404 extends Container implements ControllerInterface
{

    public function index()
    {
        $twig = $this->twig();
        $html = $twig->render('error404.twig');
        echo $html;
    }
}