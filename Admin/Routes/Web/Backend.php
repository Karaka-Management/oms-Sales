<?php declare(strict_types=1);

use Modules\Sales\Controller\BackendController;
use Modules\Sales\Models\PermissionState;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^.*/sales/analysis(\?.*|$)$' => [
        [
            'dest'       => '\Modules\Sales\Controller\BackendController:viewDashboard',
            'verb'       => RouteVerb::GET,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionState::ANALYSIS,
            ],
        ],
    ],
];
