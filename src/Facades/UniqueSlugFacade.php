<?php

namespace Shah\LaravelUniqueSlugGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Shah\LaravelUniqueSlugGenerator\UniqueSlug
 */
class UniqueSlugFacade extends Facade
{
    /**
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'unique-slug';
    }
}
