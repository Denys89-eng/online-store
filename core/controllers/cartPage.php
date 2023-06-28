<?php

use \RedBeanPHP\R;

class cartPage extends Container implements ControllerInterface
{


    public function index()
    {

        $arr = [];
        $sum = 0;


        foreach ($_SESSION['cart'] as $key => $value) {
            $products = R::getRow('select * from products where products.id = ?', [$key]);
            $products['count'] = $value;
            $arr[] = $products;
            $sum += $products['price'] * $value;
            //array_push($arr, $products);
        }




        $twig = $this->twig();
        $html = $twig->render('Layouts/header.twig');
        $html .= $twig->render('cartPage.twig', ['cart' => $arr, 'total' => $sum]);
        $html .= $twig->render('Layouts/footer.twig');
        echo $html;


    }


    public function decrease()
    {

        if (isset($_SESSION['cart'][ARGUMENT])) {
            if ($_SESSION['cart'][ARGUMENT] > 1) {
                $_SESSION['cart'][ARGUMENT]--;

            } else if ($_SESSION['cart'][ARGUMENT] == 1) {
                unset($_SESSION['cart'][ARGUMENT]);
            }

        }

        header('location: /cart');

    }


    public function increase() {


        if (isset($_SESSION['cart'][ARGUMENT])) {
            $_SESSION['cart'][ARGUMENT]++;
        }


        header('location: /cart');
    }

    public function delete() {

        if ($_SESSION['cart'][ARGUMENT]) {
            unset($_SESSION['cart'][ARGUMENT]);
        }

        header('location: /cart');
    }

}