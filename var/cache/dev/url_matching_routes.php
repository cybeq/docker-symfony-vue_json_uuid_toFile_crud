<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/message' => [[['_route' => 'app_message', '_controller' => 'App\\Controller\\MessageController::index'], null, null, null, false, false, null]],
        '/message/create' => [[['_route' => 'app_message_create', '_controller' => 'App\\Controller\\MessageController::create'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/message/list(?:/([^/]++))?(*:69)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        69 => [
            [['_route' => 'app_message_list', 'sort' => null, '_controller' => 'App\\Controller\\MessageController::list'], ['sort'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
