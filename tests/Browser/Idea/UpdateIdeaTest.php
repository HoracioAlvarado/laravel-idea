<?php

use App\Models\Idea;
use App\Models\User;

it('shows the initial title', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = Idea::factory()->for($user)->create();

    visit(route('idea.show', $idea))
        ->click('@edit-idea-button')
        ->assertValue('title', $idea->title);
});

it('edits an existing Idea', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = Idea::factory()->for($user)->create();

    visit(route('idea.show', $idea))
        ->click('@edit-idea-button')
        ->fill('title', 'Some Example Title')
        ->click('@button-status-completed')
        ->fill('description', 'This is a description')
        ->fill('@new-link', 'https://laravel.com')
        ->click('@submit-new-link-button')
        ->fill('@new-step', 'Do something.')
        ->click('@submit-new-step-button')
        ->fill('@new-step', 'Do something else.')
        ->click('@submit-new-step-button')
        ->click('Update')

        ->assertRoute('idea.show', [$idea]);

    expect($idea = $user->ideas->first())->toMatchArray([
        'title' => 'Some Example Title',
        'status' => 'completed',
        'description' => 'This is a description',
        'links' => [$idea->links[0], 'https://laravel.com'],
    ]);

    expect($idea->steps)->toHaveCount(2);

});
