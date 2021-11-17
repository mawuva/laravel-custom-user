<?php

namespace Mawuekom\CustomUser\Actions;

use Illuminate\Database\Eloquent\Model;

class CheckUserCredentialsAction
{
    /**
     * Execute action
     *
     * @param string $credentials
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function execute(string $credentials): ?Model
    {
        $user = app(config('custom-user.user.model'));

        $result = $user ->where('email', $credentials);

        if (get_attribute('phone_number', 'enabled')) {
            $result ->orWhere('phone_number', $credentials);
        }

        if (get_attribute('username', 'enabled')) {
            $result ->orWhere('username', $credentials);
        }

        return $result ->first();
    }
}