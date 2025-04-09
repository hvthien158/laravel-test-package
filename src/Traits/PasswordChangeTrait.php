<?php

namespace Thien\LaravelTestPackage\Traits;

use Thien\LaravelTestPackage\Mail\PasswordChangedNotificationMail;
use Thien\LaravelTestPackage\Observers\PasswordChangedObserver;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

trait PasswordChangeTrait
{
    protected static function booted()
    {
        static::observe(PasswordChangedObserver::class);
    }

    public function passwordColumnName(): string
    {
        return 'password';
    }

    public function emailColumnName(): string
    {
        return 'email';
    }

    public function passwordChangedNotificationMail(): Mailable
    {
        return new PasswordChangedNotificationMail();
    }

    public function isPasswordChanged(): bool
    {
        return $this->wasChanged($this->passwordColumnName());
    }

    public function shouldPasswordChangedNotificationMailQueued(): bool
    {
        return false;
    }

    public function sendPasswordChangeNotification(): void
    {
        if (!$this->isPasswordChanged()) {
            return;
        }

        $mail = Mail::to($this->getRawOriginal($this->emailColumnName()));

        if ($this->shouldPasswordChangedNotificationMailQueued()) {
            $mail->queue($this->passwordChangedNotificationMail());

            return;
        }

        $mail->send($this->passwordChangedNotificationMail());
    }
}
