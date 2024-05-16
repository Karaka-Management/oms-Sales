<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Sales\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Sales\Models;

use Modules\Admin\Models\Account;

/**
 * Sales rep class.
 *
 * @package Modules\Sales\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
class SalesRep
{
    /**
     * ID value.
     *
     * @var int
     * @since 1.0.0
     */
    public int $id = 0;

    public string $code = '';

    public ?Account $main = null;

    public array $accounts = [];
}
