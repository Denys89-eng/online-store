<?php

use \RedBeanPHP\R;

class Main extends Container implements ControllerInterface
{

    public function index()
    {
        $products = R::getAll('select * from products');
        $subcategory = R::getAll('SELECT * FROM categories LEFT JOIN subcategories ON categories.id = subcategories.parent_id');



        if (isset($_SESSION['x']) && $_SESSION['x'] == 1) {
            $a = '<a href="/account/exit">Log out</a>';
        } else {
            $a = '<a href="/register">Register</a>
           <a href="/login">Login</a>';
        }
        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig', ['account' => $a, ]);
        $html .= $twig->render('main.twig', ['category' => $subcategory, 'products' => $products]);
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;
    }
}


