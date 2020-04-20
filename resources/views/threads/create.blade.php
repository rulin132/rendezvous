@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="bd-title" id="content">Create a New Topic</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <form method="POST" action="{{ Route('threads.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title" />
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 float-right">Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
