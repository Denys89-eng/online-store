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

    public function products()
    {

        if (isset($_POST['create_product'])) {
            if ($_FILES['image']['size'] > 0) {
                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/png") {
                    $res = explode('.', $_FILES['image']['name']);
                    $res = array_reverse($res);

                    $filename = md5(uniqid()) . "." . $res[0];
                    $upl = move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $filename);

                    if ($upl == true) {

                        $arr = R::getRow("select COUNT(*) as count from products where title = ?", [$_POST['product_ru']]);
                        if ($arr['count'] == 0) {
                            $p = R::dispense('products');
                            $p->title = safeRequests::clearData($_POST['product_ru']);
                            $p->titleen = safeRequests::clearData($_POST['product_en']);
                            $p->description = safeRequests::clearData($_POST['product_description']);
                            $p->price = safeRequests::clearData($_POST['product_price']);
                            $p->currency = safeRequests::clearData($_POST['currency']);
                            $p->category_id = safeRequests::clearData($_POST['select_category']);
                            $p->subcategory_id = safeRequests::clearData($_POST['select_subcategory']);
                            $p->img = $filename;
                            R::store($p);
                            header('location: /@admin/products/');
                        } else {
                            echo '<script>alert("продукт уже существует"); window.location.href = window.location.href</script>';
                        }

                    } else{
                        echo "<script>alert('ошибка при загрузке изображения'); window.location.href = window.location.href</script>";
                    }
                }  else {
                    echo "<script>alert(' формат изображения неверный'); window.location.href = window.location.href</script>";
                }
            } else {

                $arr = R::getRow("select COUNT(*) as count from products where title = ?", [$_POST['products_ru']]);
                if ($arr['count'] == 0) {
                    $p = R::dispense('products');
                    $p->title = safeRequests::clearData($_POST['product_ru']);
                    $p->titleen = safeRequests::clearData($_POST['product_en']);
                    $p->description = safeRequests::clearData($_POST['product_description']);
                    $p->price = safeRequests::clearData($_POST['product_price']);
                    $p->currency = safeRequests::clearData($_POST['currency']);
                    $p->category_id = safeRequests::clearData($_POST['select_category']);
                    $p->subcategory_id = safeRequests::clearData($_POST['select_subcategory']);
                    $p->img = 'nophoto.jpg';

                    R::store($p);
                    header('location: /@admin/products/');
                } else {
                    echo '<script>alert("Категория уже существует"); window.location.href = window.location.href</script>';
                }
            }



        }

        $categories = R::getAll('select * from categories');
        $subcategories = R::getAll('select * from subcategories');
        $products = R::getAll('select * from products');
        $twig = $this->twig();
        $page = $twig->render('dashboard/products.twig', ['products' => $products, 'list' => $categories,'subcat' => $subcategories]);
        echo $twig->render('dashboard/admin.twig', ['content' => $page]);


    }

    public function categories()
    {

        $categories = R::getAll('SELECT * FROM categories');
        if (isset($_POST['create_category'])) {
            $arr = R::getRow("SELECT COUNT(*) as total FROM 
                             categories WHERE title = ?", [$_POST['category_ru']]);
            if ($arr['total'] == 0) {
                $c = R::dispense('categories');
                $c->title = safeRequests::clearData($_POST['category_ru']);
                $c->link = safeRequests::clearData($_POST['category_en']);
                R::store($c);
                header('location: /@admin/categories/');
            } else {
                echo '<script>alert("Категория уже существует"); window.location.href = window.location.href</script>';
            }

        }


        if (isset($_POST['create_subcategory'])) {
            $arr_sub = R::getRow("SELECT COUNT(*) as total FROM 
                             subcategories WHERE name = ?", [$_POST['subcategory_ru']]);

            if ($arr_sub['total'] == 0) {
                $s = R::dispense('subcategories');
                $s->name = safeRequests::clearData($_POST['subcategory_ru']);
                $s->sublink = safeRequests::clearData($_POST['subcategory_en']);
                $s->parentID = safeRequests::clearData($_POST['parent_category']);
                R::store($s);
                header('location: /@admin/categories/');

            } else {
                echo '<script>alert("Подкатегория уже существует"); window.location.href = window.location.href</script>';

            }

        }

        $categories2 = R::getAll('SELECT * FROM categories ORDER BY id DESC');
        $twig = $this->twig();
        $page = $twig->render('dashboard/categories.twig', ["array" => $categories, "rows" => $categories2]);
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

    public function delcat()
    {
        echo ARGUMENT;
        $delete_categories = R::exec('DELETE FROM categories WHERE id = ?', [ARGUMENT]);
        $delete_products = R::exec('DELETE FROM products WHERE id = ?', [ARGUMENT]);

        if ($delete_categories) {
            header('location: /@admin/categories/');
        } elseif ($delete_products) {
            header('location: /@admin/products/');
        }

    }

    public function exit()
    {
        unset($_SESSION['p']);
        header('location: /@admin');
    }


}