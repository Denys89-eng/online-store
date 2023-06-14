<?php


class Contacts extends Container implements ControllerInterface {

    public function index()
    {

        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig');
        $html .= $twig->render('contacts.twig');
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;
        // TODO: Implement index() method.
    }

}