@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="bd-title" id="content">{{ $thread->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                    <div class="card mb-3">
                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
