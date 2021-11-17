<?php

namespace Mawuekom\CustomUser\Actions;

use Illuminate\Database\Eloquent\Model;
use Mawuekom\CustomUser\Facades\CustomUser;

class UpdatePasswordAction
{
    /**
     * Execute action
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $password
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(Model $model, string $password): Model
    {
        $model ->password    = CustomUser::handlePassword($password);
        CustomUser::updatePasswordChangedAt($model);
        $model ->save();

        return $model;
    }
}