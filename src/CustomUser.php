<?php

namespace Mawuekom\CustomUser;

use Illuminate\Support\Facades\Hash;

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
                    ? Hash::make()
                    : bcrypt($password);
    }
}
