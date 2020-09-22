<?php
namespace Tests\Setup;

use App\Tweet;
use App\User;

class TweetsFactory
{

    protected $user;


    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }


    public function create()
    {
        $tweet = factory(Tweet::class)->create([
            'owner_id' => $this->user ?? factory(User::class)
        ]);

        return $tweet;

    }
}


