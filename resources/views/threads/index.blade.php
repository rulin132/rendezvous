@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="bd-title" id="content">Topics</h1>
            </div><div class="col-md-2">
                <a class="btn btn-primary float-right" href="{{ Route('threads.create') }}">Create Topic</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                @foreach($threads as $thread)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h5>

                            {{ $thread->body }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
