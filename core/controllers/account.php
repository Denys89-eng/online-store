<?php


class account extends Container implements ControllerInterface
{
    public function index()
    {

        if (isset($_SESSION['x']) && $_SESSION['x'] == 1) {

            $a = '<a href="/account/exit">Log out</a>';

            $twig = $this->twig();
            $html = $twig->render('Layouts/header.twig', ['account' => $a]);
            $html .= $twig->render('account.twig');
            $html .= $twig->render('Layouts/footer.twig');
            echo $html;
        } else {
            header('location: /');
        }
    }

    public function exit()
    {
        unset($_SESSION['x']);
        header('location: /');
    }

}