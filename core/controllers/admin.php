<?php

use \RedBeanPHP\R;


class Admin extends Container implements ControllerInterface
{

    public function index()
    {
        $twig = $this->twig();

        if (isset($_SESSION['p']) && $_SESSION['p'] === 20) {
            $this->statistics();
        } else {
            echo $html = $twig->render('dashboard/login.twig');
        }

    }


    public function statistics()
    {
        $twig = $this->twig();
        $page = $twig->render('dashboard/statistics.twig');
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);

    }

    public function products()
    {
        $twig = $this->twig();
        $page = $twig->render('dashboard/products.twig');
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);

    }

    public function settings()
    {
        $twig = $this->twig();
        $page = $twig->render('dashboard/settings.twig');
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);
    }

    public function orders()
    {
        $twig = $this->twig();
        $page = $twig->render('dashboard/orders.twig');
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);
    }

    public function users()
    {
        $twig = $this->twig();
        $page = $twig->render('dashboard/users.twig');
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);
    }
    public function categories(){
        $twig = $this->twig();
        $page = $twig->render('dashboard/categories.twig');
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);
    }


    public function login()
    {
        $login = safeRequests::clearData($_POST['login']);
        $password = safeRequests::clearData($_POST['password']);
        $res = R::findOne('Admin', 'login=?', [$login]);

        if (!empty($res)) {
            $pass = password_verify($password, $res->password);
            if ($pass === true) {
                $_SESSION['p'] = 20;
                header('location: /@admin');
            } else {
                echo 'неправильынй пароль';
            }
        } else {
            echo 'login or password Не существует!!!';
        }
    }

    public function exit()
    {
        unset($_SESSION['p']);
        header('location: /@admin');
    }


}