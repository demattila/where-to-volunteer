<?php
/**
 * Created by PhpStorm.
 * User: demeterattila
 * Date: 2019. 11. 26.
 * Time: 11:23
 */

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class EventFilter extends AbstractFilter
{
    protected $filters = [
        'category' => CategoryFilter::class
    ];
}