<?php

use \RedBeanPHP\R;

class Login extends Container implements ControllerInterface
{


    public function index()
    {

        if (isset($_POST['log'])) {
            $login = safeRequests::clearData($_POST['login']);
            $password = safeRequests::clearData($_POST['password']);
            $res = R::findOne('users', 'login=?', [$login]);

            if (!empty($res)) {
                $pass = password_verify($password, $res->password);
                if ($pass == true) {
                    $_SESSION['x'] = 1;
                    header('location: /account');
                } else {
                    echo 'password not correct';
                }
            } else {
                echo 'Undefined Email';
            }
        }


        $twig = $this->twig();
        $html = $twig->render('login.twig');
        echo $html;
    }


    public function exit()
    {

    }


}