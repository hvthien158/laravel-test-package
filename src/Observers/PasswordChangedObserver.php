<?php

namespace Thien\LaravelTestPackage\Observers;

use Thien\LaravelTestPackage\Contract\PasswordChangedNotificationContract;

class PasswordChangedObserver
{
    public function updated(PasswordChangedNotificationContract $model)
    {
        $model->sendPasswordChangeNotification();
    }
}
