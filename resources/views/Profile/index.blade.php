@extends('layouts.app')

@section('content')

    <header class="row justify-content-sm-center">
        <div class="col-md-2">
            <img class="rounded-circle" style="width: 150px; height: 150px"
                 src="{{asset('storage/media/'.$user->media->name)}}"
                 alt="avatar">
        </div>
        <section class="col-md-6 pt-4 ml-5">
            <div class="row pl-4">
                <h2 class="">{{$user->username}}</h2>
                @can('show',$user)
                    <button class="btn btn-outline-light "><a
                            class="font-weight-bold border rounded text-dark text-decoration-none p-1"
                            href={{route('account.edit')}}>Edit Profile</a>
                    </button>
                    <button class="btn btn-outline-light "><a
                            class="font-weight-bold border rounded text-dark text-decoration-none p-1"
                            href={{route('post.create')}}>New Post</a>
                    </button>
                @endcan
                @cannot('show',$user)
                    <button class="btn btn-outline-light ">
                        @if($is_following)
                            <a
                                class="font-weight-bold border rounded text-dark text-decoration-none p-1"
                                href={{route('unfollow', $user->username)}}>Unfollow</a>
                        @elseif($follow_requested)
                            <a
                                class="font-weight-bold border rounded text-dark text-decoration-none p-1"
                                href="#">Requested</a>
                        @else
                            <a
                                class="font-weight-bold border rounded text-dark text-decoration-none p-1"
                                href={{route('follow', $user->username)}}>Follow</a>
                        @endif
                    </button>
                @endcannot

            </div>
            <ul class="list-unstyled list-group list-group-horizontal">
                <li class="p-3 bg-light"><span><span class="mr-1">{{$user->post->count()}}</span>posts</span></li>
                <li class="p-3 bg-light"><span><span class="mr-1">{{$followers}}</span><a
                            class="text-dark text-decoration-none" href="{{route('followers', $user->username)}}">followers</a></span>
                </li>
                <li class="p-3 bg-light"><span><span class="mr-1">{{$followings}}</span><a
                            class="text-dark text-decoration-none" href="{{route('followings', $user->username)}}">following</a></span>
                </li>
            </ul>
            <div class="pl-3">
                <div><h5>Bio</h5></div>
                <div>{{$user->bio}}</div>
            </div>
        </section>
    </header>
    <hr style="border-top: 1px solid #8c8c8c">

    <div>
        <div class="row">
            @foreach($user->post as $post)
                <div class="ml-1 mb-1" style="width: 19%;">
                    <a href="{{route('post.show', $post->id)}}">
                        <img style="max-width: 100%; max-height: 100%"
                             src="{{asset('storage/media/'.$post->media->name)}}"
                             alt="avatar">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
