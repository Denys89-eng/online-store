<?php


use \RedBeanPHP\R;

class Register extends Container implements ControllerInterface {

   public function index() {
       $data = $_POST;

       if (isset($_POST['register'])) {
           $errors = array();
           if (trim($data['email']) == '') {
               $errors[] = 'Укажите имя';
           }
           if (trim($data['login']) == '') {
               $errors[] = 'Укажите логин';
           }
           if (trim($data['password']) == '') {
               $errors[] = 'Укажите пароль';
           }

           if (R::count('users', 'email = ?', array($data['email'])) > 0 ) {
                  $errors[] = 'Пользователь с таким Email зарегистрирован';
           }

           if (empty($errors)) {
               $user = R::dispense('users');
               $user->email = safeRequests::clearData($data['email']);
               $user->login = safeRequests::clearData($data['login']);
               $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
               R::store($user);

               header('Location: /');
           }


       }





       $twig = $this->twig();
       $html = $twig->render('register.twig');
       echo $html;
   }

}