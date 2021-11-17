<?php

namespace Mawuekom\CustomUser\Traits;

use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\PasswordHistory\Traits\HasPasswordHistory;

trait UserCustomization
{
    use GeneratesUuid, HasPasswordHistory;

    /**
     * The names of the columns that should be used for the UUID.
     *
     * @return array
     */
    public function uuidColumns(): array
    {
        return [config('custom-user.uuids.column')];
    }

    /**
     * Get user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return (get_attribute('first_name', 'enabled'))
                ? "{$this ->first_name} {$this ->name}"
                : "{$this ->name}";
    }
}
