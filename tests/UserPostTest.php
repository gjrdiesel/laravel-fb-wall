<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserPostTest extends TestCase
{

    public function testUserCanCreatePost()
    {
        $user = factory(User::class)->create();
        $user->posts()->create(['content'=>'My First Test Post!']);
    }

    public function testUsersSharePosts()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();

        $post = $user1->posts()->create(['content'=>'My first post to share']);
        $post->shares()->attach($user2);
        $post->shares()->attach($user3);
    }
}
