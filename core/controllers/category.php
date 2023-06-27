<?php

use \RedBeanPHP\R;


class category extends Container implements ControllerInterface
{

    public function index()
    {


        $subcategory = R::getAll('SELECT * FROM categories LEFT JOIN subcategories ON categories.id = subcategories.parent_id');

        $category_products = R::getAll("SELECT p.*,c.title as ctitle  FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE c.link = ?;
", [ARGUMENT]);


        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig');
        $html .= $twig->render('category.twig', ['category' => $subcategory,'name' => $category_products[0]['ctitle'], 'products' => $category_products]);
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;


    }
}