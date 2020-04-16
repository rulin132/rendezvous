<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipateInRendezvousTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->create();

        $this->post(route('thread-replies', ['thread' => $thread->id]), []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_threads()
    {
        $user = factory('App\User')->create();

        $this->signIn($user);

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();

        $this->post(route('thread-replies', ['thread' => $thread->id]), $reply->toArray());

        $this->get(route('thread-show', ['thread' => $thread->id]))
            ->assertSee($reply->body);
    }
}
