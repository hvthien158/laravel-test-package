<?php

use Illuminate\Support\Facades\Mail;
use Thien\LaravelTestPackage\Tests\Models\User;

it('send mail', function () {
    Mail::fake();

    $user = User::factory()->create();

    $user->password = bcrypt('password');
    $user->save();

    Mail::assertSent($user->passwordChangedNotificationMail()::class);
});

it('not send mail', function () {
    Mail::fake();

    $user = User::factory()->create();

    $user->name = 'Thien';
    $user->save();

    Mail::assertNotSent($user->passwordChangedNotificationMail()::class);
});
