@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">
                        @foreach($posts as $post)
                            <div>
                                <div>
                                    <img class="rounded-circle" style="width: 150px; height: 150px"
                                         src="{{asset('storage/media/'.$post->user->media->name)}}"
                                         alt="avatar">
                                </div>
                                <div>
                                    {{$post->user->username}}
                                </div>
                                <div>
                                    <img src="{{asset('storage/media/'.$post->media->name)}}" alt="post" style="max-width: 100%; max-height: 100%">
                                </div>
                                <div>
                                    <p>{{$post->body}}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
