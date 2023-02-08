<?php

namespace DevPromtheus98\Flashy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DevPromtheus98\Flashy\Flashy
 */
class Flashy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \DevPromtheus98\Flashy\Flashy::class;
    }
}
