@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="bd-title" id="content">
                    {{ $thread->title }}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card mb-3 pt-3 pb-3">
                    <div class="card-body" style="font-size: 15px">
                        {{ $thread->body }}
                    </div>
                    <div class="card-footer">
                        Topic Started by
                        <a href="#">{{ $thread->creator->name }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <h5>Discussion</h5>
                <p>Join the discussion on this topic below.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card  mb-3">
                    <div class="card-body">
                        @foreach($thread->replies as $reply)
                            @include ('threads.reply')

                            @if(!$loop->last)
                                <hr />
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->check())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="post" action="{{ route('threads-reply.store', $thread->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Whats your opinion?" rows="5"></textarea>
                            <button type="submit" class="btn btn-primary mt-3 float-right">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center">Please <a href="{{ Route('login') }}">Login</a> to post your opinion to the topic.</p>
        @endif
    </div>
@endsection
