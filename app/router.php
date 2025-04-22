<?php

$routes = [
//    'product\/.*' => 'Reviews',
//    'article\/.*' => 'Reviews',
    '$' => 'Reviews',
];

$routes['.*$'] = 'Page404';

return $routes;