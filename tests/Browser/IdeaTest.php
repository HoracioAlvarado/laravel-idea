<?php

use App\Models\User;

it('creates a new Idea', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some Example Title')
        ->click('@button-status-completed')
        ->fill('description', 'This is a description')
        ->click('Create')
        ->assertPathIs('/ideas');

    expect($user->ideas->first())->toMatchArray([
        'title' => 'Some Example Title',
        'status' => 'completed',
        'description' => 'This is a description',
    ]);

});
