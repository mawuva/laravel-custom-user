<?php

namespace Mawuekom\LaravelCustomUser;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mawuekom\LaravelCustomUser\Skeleton\SkeletonClass
 */
class LaravelCustomUserFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-custom-user';
    }
}
