<?php

namespace Mawuekom\CustomUser;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mawuekom\CustomUser\Skeleton\SkeletonClass
 */
class CustomUserFacade extends Facade
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
