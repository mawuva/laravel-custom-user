<?php

namespace Mawuekom\CustomUser\Traits;

use Mawuekom\ModelUuid\Utils\GeneratesUuid;

trait UserCustomization
{
    use GeneratesUuid;

    /**
     * The names of the columns that should be used for the UUID.
     *
     * @return array
     */
    public function uuidColumns(): array
    {
        return [config('custom-user.uuids.column')];
    }
}
