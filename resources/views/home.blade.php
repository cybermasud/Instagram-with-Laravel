@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card card mb-xl-5">
                        <div class="card-header bg-white p-2">
                            <div class="row">
                                <div class="col-sm-1 mr-3">
                                    <a href="{{route('profile.show',$post->user->username)}}"><img
                                            class="rounded-circle" style="width: 50px; height: 50px"
                                            src="{{asset($post->user->media->name)}}"
                                            alt="avatar"></a>
                                </div>

                                <div class="my-auto">
                                    <a class="text-decoration-none text-dark font-weight-bold"
                                       href="{{route('profile.show',$post->user->username)}}">{{$post->user->username}}</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('post.show',$post->id)}}"><img class="card-img-top"
                                                                            src="{{asset($post->media->name)}}"
                                                                            alt="post"
                                                                            style="max-width: 100%; max-height: 100%"></a>
                        </div>
                        <div class="card-body p-2">

                            <div>
                                @if(!$post->likedByUser())
                                    <a href="{{route('like',$post->id)}}"><img
                                            src="{{asset('images/like.jpg')}}"
                                            style="height: 20px;width: 20px"
                                            alt="like">
                                    </a>
                                @else
                                    <a href="{{route('unlike',$post->id)}}"><img
                                            src="{{asset('images/liked.jpg')}}"
                                            style="height: 20px;width: 20px"
                                            alt="like">
                                    </a>
                                @endif

                                <span class="ml-1"><a class="text-decoration-none text-dark"
                                                      href="{{route('liked.users',$post->id)}}">{{$post->likes->count()}} likes</a>
                                    </span>
                            </div>

                            <div class="col-sm-6 my-auto">
                                {{$post->body}}
                            </div>
                            @if($post->comments->isNotEmpty())
                                <div>
                                    <div>Comments</div>
                                    <div class="row">
                                        <div class="col-sm-1 my-auto pr-0">
                                            <img class="rounded-circle" style="height: 30px;width: 30px"
                                                 src="{{asset($post->comments->first()->user->media->name)}}"
                                                 alt="avatar">
                                        </div>
                                        <div class="col-md-1 my-auto p-0">
                                            {{$post->comments->first()->user->username}}
                                        </div>
                                        <div class="col-sm-10 my-auto pl-0">
                                            {{$post->comments->first()->body}}
                                        </div>
                                    </div>
                                    <div><a href="{{route('post.show',$post->id)}}">see more comments</a></div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
