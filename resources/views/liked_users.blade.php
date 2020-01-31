@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liked Users</div>
                    <div class="card-body">
                        @foreach($likes as $like)
                            <div class="row">
                                <div class="col-md-1">
                                    <img alt="avatar" style="width: 50px; height: 50px" class="rounded-circle" src="{{asset('storage/media/'.$like->user->media->name)}}">
                                </div>
                                <div class="col-md-4"><p class="py-2">{{$like->user->username}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
