<?php

/*
 *
 * class: Main
 * Method:index(array) return string
 *
 *
  */

class Main extends Container implements ControllerInterface
{
    public function index()
    {

       $twig = $this->twig();
       $html = $twig->render('Layouts/header.twig');
       $html .= $twig->render('main.twig');
       $html .= $twig->render('Layouts/footer.twig');
       echo $html;
    }
}


