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

        $result = $user ->where('email', $credentials)
                        ->orWhere('name', $credentials);

        if (get_attribute('phone_number', 'enabled')) {
            $result ->orWhere('phone_number', $credentials);
        }

        return $result ->first();
    }
}