<?php
/**
 * Karaka
 *
 * PHP Version 8.1
 *
 * @package   Modules\Sales\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://karaka.app
 */
declare(strict_types=1);

namespace Modules\Sales\Models;

use phpOMS\Stdlib\Base\Enum;

/**
 * Permision state enum.
 *
 * @package Modules\Sales\Models
 * @license OMS License 1.0
 * @link    https://karaka.app
 * @since   1.0.0
 */
abstract class PermissionCategory extends Enum
{
    public const ARCHIVE = 1;

    public const ANALYSIS = 2;
}
