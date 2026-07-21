<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the about page returns a successful response', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
});

test('the contact page returns a successful response', function () {
    $response = $this->get('/contact');

    $response->assertStatus(200);
});
