<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/lists' => [
            [['_route' => 'get_lists', '_controller' => 'App\\Controller\\HomeController::getListsAction', '_format' => 'json'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'post_list', '_controller' => 'App\\Controller\\HomeController::postListAction', '_format' => 'json'], null, ['POST' => 0], null, false, false, null],
        ],
        '/images' => [[['_route' => 'post_image', '_controller' => 'App\\Controller\\HomeController::postImageAction', '_format' => 'json'], null, ['POST' => 0], null, false, false, null]],
        '/api/login_ckeck' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
    ],
    [ // $dynamicRoutes
    ],
    null, // $checkCondition
];
