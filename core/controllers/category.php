<?php

use \RedBeanPHP\R;


class category extends Container implements ControllerInterface
{

    public function index()
    {

        $subcategory = R::getAll('SELECT * FROM categories LEFT JOIN subcategories ON categories.id = subcategories.parent_id');
        $category_products = R::getAll("SELECT p.*,c.title as ctitle  FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE c.link = ?;
", [ARGUMENT]);




        if (isset($_SESSION['x']) && $_SESSION['x'] == 1) {
            $a = '<a href="/account/exit">Log out</a>';
        } else {
            $a = '<a href="/register">Register</a>
           <a href="/login">Login</a>';
        }

        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig', ['account' => $a, 'count' => CounterCart::count()]);
        $html .= $twig->render('category.twig', ['category' => $subcategory, 'products' => $category_products]);
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;


    }
}