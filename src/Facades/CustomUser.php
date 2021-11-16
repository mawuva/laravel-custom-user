<?php

namespace Mawuekom\CustomUser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mawuekom\CustomUser\Skeleton\SkeletonClass
 */
class CustomUser extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'custom-user';
    }
}
