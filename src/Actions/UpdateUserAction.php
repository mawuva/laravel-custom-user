<?php

namespace Mawuekom\CustomUser\Actions;

use Illuminate\Database\Eloquent\Model;
use Mawuekom\CustomUser\DataTransferObjects\UpdateUserDTO;

class StoreUserAction
{
    /**
     * Execute action
     *
     * @param \Mawuekom\CustomUser\DataTransferObjects\UpdateUserDTO $updateUserDTO
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(UpdateUserDTO $updateUserDTO): Model
    {
        $user = app(config('custom-user.user.model'));

        $user ->name        = $updateUserDTO ->name;
        $user ->email       = $updateUserDTO ->email;

        if (get_attribute('first_name', 'enabled') && $updateUserDTO ->first_name !== null) {
            $user ->first_name  = $updateUserDTO ->first_name;
        }

        if (get_attribute('phone_number', 'enabled') && $updateUserDTO ->phone_number !== null) {
            $user ->phone_number  = $updateUserDTO ->phone_number;
        }

        if (get_attribute('gender', 'enabled') && $updateUserDTO ->gender !== null) {
            $user ->{get_attribute('gender', 'name')}  = $updateUserDTO ->gender;
        }

        $user ->save();

        return $user;
    }
}