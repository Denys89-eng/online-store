<?php
use \RedBeanPHP\R;
R::setup("mysql:host=$_ENV[host];dbname=$_ENV[name]", $_ENV["login"], $_ENV['password']);
if (!R::testConnection()) {
    die('Error connection');
}
