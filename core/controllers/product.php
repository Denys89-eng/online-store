<?php

use \RedBeanPHP\R;


class product extends Container implements ControllerInterface
{
    public function index()
    {

        $info = R::getRow("select * from products where products.titleen = ?", [ARGUMENT]);
        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig');
        $html .= $twig->render('product.twig', ['title' => $info['title'], 'description' => $info['description'],'price' => $info['price'], 'img' => $info['img']]);
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;
    }

    public  function buy() {


        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        if( isset($_SESSION['cart'][ARGUMENT]) ){
            $_SESSION['cart'][ARGUMENT]++;
        }else{
            $_SESSION['cart'][ARGUMENT] = 1;
        }

        echo "<script>window.history.go(-1)</script>";
    }


}