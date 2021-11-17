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

        if (get_attribute('first_name', 'enabled') && $storeUserDTO ->first_name !== null) {
            $user ->first_name  = $storeUserDTO ->first_name;
        }

        if (get_attribute('username', 'enabled') && $storeUserDTO ->username !== null) {
            $user ->username  = $storeUserDTO ->username;
        }

        if (get_attribute('phone_number', 'enabled') && $storeUserDTO ->phone_number !== null) {
            $user ->phone_number  = $storeUserDTO ->phone_number;
        }

        if (get_attribute('gender', 'enabled') && $storeUserDTO ->gender !== null) {
            $user ->{get_attribute('gender', 'name')}  = $storeUserDTO ->gender;
        }

        if (get_attribute('agree_with_policy_and_terms', 'enabled') && $storeUserDTO ->agree_with_policy_and_terms !== null) {
            $user ->{get_attribute('agree_with_policy_and_terms', 'name')}  = now();
        }

        $user ->save();

        if (config('custom-user.password_history.enabled')) {
            $user ->updatePasswordHistory();
        }

        return $user;
    }
}