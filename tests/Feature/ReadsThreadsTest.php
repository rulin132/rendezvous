<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadsThreadsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    protected $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function a_user_can_browse_threads()
    {
        $this->get(Route('threads.index'))
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_a_thread()
    {
        $this->get(route('threads.show', ['thread' => $this->thread->id]))
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = create('App\Reply', ['thread_id' => $this->thread->id]);

        $this->get(route('threads.show', ['thread' => $this->thread->id]))
            ->assertSee($reply->body);
    }
}
