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
                                    <a href="{{route('post.show',$post->id)}}"><img
                                            src="{{asset('storage/media/'.$post->media->name)}}" alt="post"
                                            style="max-width: 100%; max-height: 100%"></a>
                                </div>
                                <div>
                                    @if(!in_array(\Illuminate\Support\Facades\Auth::id(),$post->likes->pluck('user_id')->toArray()))
                                        <a href="{{route('like',$post->id)}}"><img
                                                src="{{asset('storage/media/like.jpg')}}"
                                                style="height: 30px;width: 30px"
                                                alt="like">
                                        </a>
                                    @else
                                        <a href="{{route('unlike',$post->id)}}"><img
                                                src="{{asset('storage/media/liked.jpg')}}"
                                                style="height: 30px;width: 30px"
                                                alt="like">
                                        </a>
                                    @endif

                                    <span class="ml-2"><a class="text-decoration-none text-dark"
                                                          href="{{route('liked.users',$post->id)}}">{{$post->likes->count()}} likes</a>
                                    </span>
                                </div>
                                <div>
                                    <div>
                                        <a href="{{route('profile.show',$post->user->username)}}"><img
                                                class="rounded-circle" style="width: 50px; height: 50px"
                                                src="{{asset('storage/media/'.$post->user->media->name)}}"
                                                alt="avatar"></a>
                                        <div>
                                            <a href="{{route('profile.show',$post->user->username)}}">{{$post->user->username}}</a>
                                        </div>
                                    </div>

                                    <p>{{$post->body}}</p>
                                </div>
                                @if($post->comments->isNotEmpty())
                                    <div>
                                        <p>Comments</p>
                                        <p><img class="rounded-circle" style="height: 30px;width: 30px"
                                                src="{{asset('storage/media/'. $post->comments->first()->user->media->name)}}"
                                                alt="avatar">{{$post->comments->first()->user->username}}
                                            <span>{{$post->comments->first()->body}}</span>
                                        </p>
                                        <p><a href="{{route('post.show',$post->id)}}">see more comments</a></p>
                                    </div>
                                @endif
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
