<?php


use App\Tweet;
use App\User;
use Tests\Setup\TweetsFactory;

    it('index_returns_a_view', function()
    {
        $this->signIn();

        $this->get(route('home'))->assertOk();
    });

    it('a_tweet_belongs_to_a_user', function()
    {
        $tweet = factory(Tweet::class)->create();

        //dd($tweet->user);
        $this->assertInstanceOf(User::class, $tweet->user);

    });


    it('an_authenticated_user_can_view_their_profile', function()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $tweet = TweetsFactory::create();
        $this->actingAs($tweet->owner)
            ->get($tweet->path())
            ->assertSee($tweet->description);
    });

   it('an_authenticated_user_can_view_another_users_profile', function()
    {
        //route to view a profile
    });
