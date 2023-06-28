<?php


class About extends Container implements ControllerInterface {
    public function index()
    {

        if (isset($_SESSION['x']) && $_SESSION['x'] == 1) {
            $a = '<a href="/account/exit">Log out</a>';
        } else {
            $a = '<a href="/register">Register</a>
           <a href="/login">Login</a>';
        }
        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig', ['account' => $a, 'count' => CounterCart::count()]);
        $html .= $twig->render('about.twig');
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;


    }
}