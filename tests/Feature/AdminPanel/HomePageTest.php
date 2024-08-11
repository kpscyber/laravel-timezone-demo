<?php

it('redirects to login page', function () {
    $this->get('/admin')
        ->assertStatus(302)
        ->assertRedirect('/admin/login');
});

it('can render login page', function () {
    $this->get('/admin/login')
        ->assertStatus(200);
});
