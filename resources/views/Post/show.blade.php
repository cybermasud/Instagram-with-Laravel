@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    <div class="card-body row justify-content-center">
                        <div class="col-md-8 justify-content-center">
                            <img src="{{asset('storage/posts/'.$post->media->name)}}"
                                 alt="post"
                                 style="max-width: 100%; max-height: 100%">
                        </div>
                        <div class="col-xs-1 mx-2 border-left border-secondary"></div>
                        <div class="col-md-3 justify-content-center">
                            <div class="mb-3">
                                <div><h4>{{$post->user->username}}</h4></div>
                            </div>
                            <hr style="border-top: 1px solid #8c8c8c">
                            <div class="mb-3"><p>{{$post->body}}</p></div>
                            <hr style="border-top: 1px solid #8c8c8c">
                            <div>
                                <ul class="list-unstyled list-group list-group-horizontal justify-content-center">
                                    <li><a href=""><img src="{{asset('storage/images/like.jpg')}}"
                                                        style="height: 50px;width: 50px"
                                                        alt="like"></a></li>
                                    <li><a href=""><img src="{{asset('storage/images/comment.jpg')}}" alt="comment"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
