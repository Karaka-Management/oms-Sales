<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use Modules\Sales\Controller\BackendController;
use Modules\Sales\Models\PermissionCategory;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^/sales/rep/list(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Sales\Controller\BackendController:viewRepList',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::SALES_REP,
            ],
        ],
    ],
    '^/sales/rep/view(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Sales\Controller\BackendController:viewRepView',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionCategory::SALES_REP,
            ],
        ],
    ],
    '^/sales/rep/create(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Sales\Controller\BackendController:viewRepCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionCategory::SALES_REP,
            ],
        ],
    ],
];
