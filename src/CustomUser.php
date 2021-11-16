<?php

namespace Mawuekom\CustomUser;

class CustomUser
{
    /**
     * Handle user's password.
     *
     * @param string|null $password
     *
     * @return string
     */
    private function handlePassword(string $password = null): string
    {
        return ($password !== null)
                    ? bcrypt($password)
                    : bcrypt(config('custom-user.default_password'));
    }
}
