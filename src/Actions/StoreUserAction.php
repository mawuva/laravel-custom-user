<?php

namespace Mawuekom\CustomUser\Actions;

use Illuminate\Database\Eloquent\Model;
use Mawuekom\CustomUser\DataTransferObjects\StoreUserDTO;
use Mawuekom\CustomUser\Facades\CustomUser;

class StoreUserAction
{
    /**
     * Execute action
     *
     * @param \Mawuekom\CustomUser\DataTransferObjects\StoreUserDTO $storeUserDTO
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(StoreUserDTO $storeUserDTO): Model
    {
        $user = app(config('custom-user.user.model'));

        $user ->name        = $storeUserDTO ->name;
        $user ->email       = $storeUserDTO ->email;
        $user ->password    = CustomUser::handlePassword($storeUserDTO ->password);

        $user ->save();

        return $user;
    }
}