<?php
/**
 * Created by PhpStorm.
 * User: demeterattila
 * Date: 2019. 11. 26.
 * Time: 11:11
 */

namespace App\Filters;

class CategoryFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('category', $value);
    }
}