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

use Modules\Admin\Models\AccountMapper;
use Modules\Media\Models\MediaMapper;
use phpOMS\DataStorage\Database\Mapper\DataMapperFactory;

/**
 * SalesRep mapper class.
 *
 * @package Modules\Sales\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @template T of SalesRep
 * @extends DataMapperFactory<T>
 */
final class SalesRepMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'sales_rep_id'         => ['name' => 'sales_rep_id',         'type' => 'int',      'internal' => 'id'],
        'sales_rep_code'         => ['name' => 'sales_rep_code',         'type' => 'string',   'internal' => 'code'],
        'sales_rep_main'    => ['name' => 'sales_rep_main',    'type' => 'int',      'internal' => 'main'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'sales_rep';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'sales_rep_id';

    /**
     * Has one relation.
     *
     * @var array<string, array{mapper:class-string, external:string, by?:string, column?:string, conditional?:bool}>
     * @since 1.0.0
     */
    public const OWNS_ONE = [
        'main' => [
            'mapper'   => AccountMapper::class,
            'external' => 'sales_rep_main',
        ],
    ];
}
