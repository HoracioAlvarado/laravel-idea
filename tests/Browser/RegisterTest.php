<?php

it('registers a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'johndoe@example.com')
        ->fill('password', 'password123')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user()->name)->toBe('John Doe');
    expect(Auth::user()->email)->toBe('johndoe@example.com');
});
