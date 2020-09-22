<?php

use function Pest\Faker\faker;

    it( 'a_user_can_write_a_tweet', function()
    {
        $this->signIn();
        //create a post -post to create page
        $this->post(route('home'), $attributes= [
            'body'=> 'description'
        ])->assertRedirect('/tweets');

    });


//
//
//    /** @test */
//    public function a_tweet_requires_a_body()
//    {
//        //
//    }
//
//
//    /** @test */
//    public function a_user_can_view_their_tweets_on_the_timeline()
//    {
//        //
//    }
//


    it('a_user_can_have_many_tweets', function()
    {
        $this->withoutExceptionHandling();

        $user = $this->signIn();

        $attributes = [
            'user_id'=> $user->id,
            'body' => faker()->sentence
        ];

        $this->post('/tweets', $attributes)->assertRedirect('/tweets');

        $this->assertDatabaseHas('tweets', ['user_id'=> $attributes['user_id']]);

    });



