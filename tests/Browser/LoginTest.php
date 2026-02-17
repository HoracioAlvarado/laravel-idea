<?php

use App\Models\User;

it('log in a user', function () {
    $user = User::factory()->create(['password' => 'password123']);

    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', 'password123')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user()->name)->toBe($user->name);
});

it('logs out a user', function () {
    $user = User::factory()->create(['password' => 'password123']);

    // Auth::login($user);
    $this->actingAs($user);

    visit('/')
        ->click('Log out');

    $this->assertGuest();
});
