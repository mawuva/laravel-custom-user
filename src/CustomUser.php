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

    /**
     * Resolve password changed at
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function updatePasswordChangedAt(Model $model)
    {
        if (password_changed_is_enabled_and_exists()) {
            $model ->password_changed_at = now();
        }
    }

    /**
     * Get user by field and value
     * 
     * @param string $attribute
     * @param string $value
     * @param bool   $inTrashed
     * @param array  $columns
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserByField($field, $value = null, $inTrashed = false, $columns = ['*'])
    {
        $data = app(config('custom-user.user.model')) ->where($attribute, '=', $id);

        return ($inTrashed)
                    ? $data ->withTrashed() ->first($columns)
                    : $data ->first($columns);
    }

    /**
     * Get user by id
     * 
     * @param int|string $id
     * @param bool       $inTrashed
     * @param array      $columns
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserById($id, $inTrashed = false, $columns = ['*'])
    {
        $key = resolve_key('custom-user', config('custom-user.user.slug'), $id, $inTrashed);

        return $this ->getUserByField($key, $id, $inTrashed, $columns);
    }
}
