<?php

it( 'a new test', function() {
    $this->signIn();
    $this->get('/tweets')->assertOk();
});
