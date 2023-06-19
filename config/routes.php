<?php

$routes = [
    'home' => 'main|index',
    'about' => 'about|index',
    'products' => 'products|index',
    'contacts' => 'contacts|index',
    'error' => 'error404|index',
    'account' => 'account|index',

    '@admin' => 'admin|index',
    '@admin/login' => 'admin|login',
    '@admin/exit' => 'admin|exit',
    '@admin/products' => 'admin|products',
    '@admin/orders' => 'admin|orders',
    '@admin/users' => 'admin|users',
    '@admin/settings' => 'admin|settings',
    '@admin/categories' => 'admin|categories',
    '@admin/delcat/.*' => 'admin|delcat',
];


