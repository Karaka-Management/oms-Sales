<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Sales
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Sales\Controller;

use phpOMS\Contract\RenderableInterface;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;
use phpOMS\Views\View;
use phpOMS\Asset\AssetType;

/**
 * Sales class.
 *
 * @package Modules\Sales
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
final class BackendController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function viewDashboard(RequestAbstract $request, ResponseAbstract $response, $data = null) : RenderableInterface
    {
        $head = $response->get('Content')->getData('head');
        $head->addAsset(AssetType::CSS, 'Resources/chartjs/Chartjs/chart.css');
        $head->addAsset(AssetType::JSLATE, 'Resources/chartjs/Chartjs/chart.js');
        $head->addAsset(AssetType::JSLATE, 'Modules/ClientManagement/Controller.js', ['type' => 'module']);

        $view = new View($this->app->l11nManager, $request, $response);
        $view->setTemplate('/Modules/Sales/Theme/Backend/sales-analysis-dashboard');
        $view->addData('nav', $this->app->moduleManager->get('Navigation')->createNavigationMid(1001602001, $request, $response));

        /////
        $monthlySalesCustomer = [];
        for ($i = 1; $i < 13; ++$i) {
            $monthlySalesCustomer[] = [
                'net_sales' => $sales = \mt_rand(1200000000, 2000000000),
                'customers' => \mt_rand(200, 400),
                'year'      => 2020,
                'month'     => $i,
            ];
        }

        $view->addData('monthlySalesCustomer', $monthlySalesCustomer);

        $annualSalesCustomer = [];
        for ($i = 1; $i < 11; ++$i) {
            $annualSalesCustomer[] = [
                'net_sales' => $sales = \mt_rand(1200000000, 2000000000) * 12,
                'customers' => \mt_rand(200, 400) * 6,
                'year'      => 2020 - 10 + $i,
            ];
        }

        $view->addData('annualSalesCustomer', $annualSalesCustomer);

        return $view;
    }
}
