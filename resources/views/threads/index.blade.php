@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="bd-title" id="content">Topics</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                @foreach($threads as $thread)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }}</a></h5>

                            {{ $thread->body }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
