<?php

namespace Mawuekom\CustomUser;

use Illuminate\Database\Eloquent\Model;

class CustomUser
{
    /**
     * Handle user's password.
     *
     * @param string|null $password
     *
     * @return string
     */
    public function handlePassword(string $password = null): string
    {
        return ($password !== null)
                    ? bcrypt($password)
                    : bcrypt(config('custom-user.default_password'));
    }

    /**
     * Update user's last login time
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function updateLastLogintAt(Model $model)
    {
        if (get_attribute('last_login', 'enabled')) {
            $model ->{get_attribute('last_login', 'name')} = now();
            $model ->save();
        }
    }
}
