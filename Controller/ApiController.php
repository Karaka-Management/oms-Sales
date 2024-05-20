<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Sales
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Sales\Controller;

use Modules\Admin\Models\NullAccount;
use Modules\Sales\Models\SalesRep;
use Modules\Sales\Models\SalesRepMapper;
use phpOMS\Message\Http\RequestStatusCode;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;

/**
 * Sales api controller class.
 *
 * @package Modules\Sales
 * @license OMS License 2.2
 * @link    https://jingga.app
 * @since   1.0.0
 */
final class ApiController extends Controller
{
    /**
     * Api method to create an cost center
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param array            $data     Generic data
     *
     * @return void
     *
     * @api
     *
     * @since 1.0.0
     */
    public function apiRepCreate(RequestAbstract $request, ResponseAbstract $response, array $data = []) : void
    {
        if (!empty($val = $this->validateRepCreate($request))) {
            $response->header->status = RequestStatusCode::R_400;
            $this->createInvalidCreateResponse($request, $response, $val);

            return;
        }

        $rep = $this->createRepFromRequest($request);
        $this->createModel($request->header->account, $rep, SalesRepMapper::class, 'rep', $request->getOrigin());

        $this->createStandardCreateResponse($request, $response, $rep);
    }

    /**
     * Validate cost center create request
     *
     * @param RequestAbstract $request Request
     *
     * @return array<string, bool>
     *
     * @since 1.0.0
     */
    private function validateRepCreate(RequestAbstract $request) : array
    {
        $val = [];
        if (($val['code'] = !$request->hasData('code'))
        ) {
            return $val;
        }

        return [];
    }

    /**
     * Method to create cost center from request.
     *
     * @param RequestAbstract $request Request
     *
     * @return SalesRep
     *
     * @since 1.0.0
     */
    private function createRepFromRequest(RequestAbstract $request) : SalesRep
    {
        $rep       = new SalesRep();
        $rep->code = $request->getDataString('code') ?? '';
        $rep->main = $request->hasData('main') ? new NullAccount((int) $request->getData('main')) : null;

        return $rep;
    }
}
