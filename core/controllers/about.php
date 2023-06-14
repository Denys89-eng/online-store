<?php


class About extends Container implements ControllerInterface {
    public function index()
    {

        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig');
        $html .= $twig->render('about.twig');
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;


    }
}