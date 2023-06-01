<?php

require_once 'vendor/autoload.php';
require_once 'core/interfaces/controllerInterface.php';
require_once  'config/routes.php';
require_once 'core/router.php';































//require_once 'vendor/autoload.php';
//use \RedBeanPHP\R as R;
//
//R::setup("mysql:host=localhost;dbname=shop",$_ENV['login'],"qwerty1234");
//
//if(!R::testConnection()){
//    die('SQL not required');
//}
//R::freeze(false);


//$r = R::dispense('items');
//$r->tel = 145654;
//$r->name = 'petya';
//R::store($r);

//$r = R::load('items',1);
//
//d($r->name);

//$r = R::findOne('items','id=?',[1]);
//d($r->name);

//$r = R::findAll('items');
//
//d($r);

//R::exec('DELETE FROM items WHERE id=1');



//$r = R::load('items', 1);
//$r->tel = 11111111;
//R::store($r);





//try {
//
//   $pdo = new PDO();
//   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//
//
//}catch(PDOException $e) {
//   echo $e->getMessage();
//}



//$array = ['red','green','blue'];
//
//$loader = new \Twig\Loader\FilesystemLoader('views');
//$twig = new \Twig\Environment($loader);
//
//$html = $twig->render('main.twig',["content"=>"<h2>LOAD</h2>", "array"=>$array]);
//echo $html;

//$dotenv = Dotenv\Dotenv::createImmutable('config');
//$dotenv->load();
//
//$a = getenv('name');
//d($_ENV['name']);
//d($_SERVER);

