<?php

namespace Thien\LaravelTestPackage\Contract;

use Illuminate\Mail\Mailable;

interface PasswordChangedNotificationContract
{
    public function passwordColumnName(): string;

    public function emailColumnName(): string;

    public function passwordChangedNotificationMail(): Mailable;

    public function isPasswordChanged(): bool;

    public function shouldPasswordChangedNotificationMailQueued(): bool;

    public function sendPasswordChangeNotification(): void;
}
