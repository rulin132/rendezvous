<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipateInRendezvousTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Collection|Model|mixed
     */
    protected $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->withoutExceptionHandling();

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post(route('threads-reply.store', [
            'thread' => $this->thread->id
        ]), []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_threads()
    {
        $user = create('App\User');

        $this->signIn($user);

        $reply = make('App\Reply');

        $attributes = [
            'thread' => $this->thread->id
        ];

        $this->post(route('threads-reply.store', $attributes), $reply->toArray());

        $this->get(route('threads.show', $attributes))
            ->assertSee($reply->body);
    }
}
