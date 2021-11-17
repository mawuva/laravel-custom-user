<?php

namespace Mawuekom\CustomUser\Actions;

use Illuminate\Database\Eloquent\Model;
use Mawuekom\CustomUser\Facades\CustomUser;
use Mawuekom\PasswordHistory\Services\PasswordHistoryChecker;

class UpdatePasswordAction
{
    /**
     * @var \Mawuekom\PasswordHistory\Services\PasswordHistoryChecker
     */
    private $passwordHistoryChecker;

    /**
     * Create new action instance
     *
     * @param \Mawuekom\PasswordHistory\Services\PasswordHistoryChecker $passwordHistoryChecker
     * 
     * @return void
     */
    public function __construct(PasswordHistoryChecker $passwordHistoryChecker)
    {
        $this ->passwordHistoryChecker = $passwordHistoryChecker;
    }
    
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
        $passwordHistoryCheckerEnabled = config('custom-user.password_history.checker');

        if ($passwordHistoryCheckerEnabled) {
            $this ->passwordHistoryChecker ->validatePassword($model, $password);
        }

        $model ->password    = CustomUser::handlePassword($password);
        CustomUser::updatePasswordChangedAt($model);
        $model ->save();

        return $model;
    }
}