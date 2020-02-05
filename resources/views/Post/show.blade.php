@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    <div class="card-body row justify-content-center">
                        <div class="col-md-7 justify-content-center p-0">
                            <img src="{{asset($post->media->name)}}"
                                 alt="post"
                                 style="max-width: 100%; max-height: 100%">
                        </div>
                        <div class="col-xs-1 mx-3 border-left border-secondary"></div>
                        <div class="col-md-4 justify-content-center p-0">
                            <div class="mb-3">
                                <div><a class="text-decoration-none text-dark"
                                        href="{{route('profile.show',$post->user->username)}}">
                                        <h4>{{$post->user->username}}</h4></a>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #8c8c8c">
                            <div class="mb-3"><p>{{$post->body}}</p></div>
                            <div class="col-md-12">
                                <ul class="list-unstyled list-group list-group-horizontal">
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('update',$post))
                                        <li class="mx-auto">
                                            <a href="{{ route('post.edit' , ['post' => $post->id]) }}">
                                                <button
                                                    class="btn btn-sm btn-outline-primary font-weight-bold border rounded px-1">
                                                    Edit
                                                </button>
                                            </a>
                                        </li>
                                        <li class="mx-auto">
                                            <form action="{{ route('post.destroy' , ['post' => $post->id ]) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="delete"
                                                        class="btn btn-sm btn-outline-danger font-weight-bold border rounded px-1">
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <hr style="border-top: 1px solid #8c8c8c">
                            <div>
                                <div class="mx-auto">
                                    @if(!in_array(\Illuminate\Support\Facades\Auth::id(),$post->likes->pluck('user_id')->toArray()))
                                        <a href="{{route('like',$post->id)}}"><img src="{{asset('images/like.jpg')}}"
                                                                                   style="height: 30px;width: 30px"
                                                                                   alt="like">
                                        </a>
                                    @else
                                        <a href="{{route('unlike',$post->id)}}"><img src="{{asset('images/liked.jpg')}}"
                                                                                     style="height: 30px;width: 30px"
                                                                                     alt="like">
                                        </a>
                                    @endif
                                    <span class="ml-2"><a class="text-decoration-none text-dark" href="{{route('liked.users',$post->id)}}">{{$post->likes->count()}} likes</a>
                                    </span>
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #8c8c8c">
                            <div class="mt-3">
                                @foreach($post->comments as $comment)
                                    <div class="row mb-1">
                                        <div class="col-sm-3"><a
                                                href="{{route('profile.show',$comment->user->username)}}"><img
                                                    class="rounded-circle"
                                                    style="width: 50px; height: 50px;"
                                                    src="{{asset($comment->user->media->name)}}"
                                                    alt="avatar"></a></div>
                                        <div class="col-sm-9"><a class="text-decoration-none text-dark"
                                                                 href="{{route('profile.show',$comment->user->username)}}">{{$comment->user->username}}</a>
                                            <div>{{$comment->body}}
                                                @if(\Illuminate\Support\Facades\Auth::user()->can('delete',$comment))
                                                    <div class="form-check-inline">
                                                        <form action="{{route('comment.destroy',$comment->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger rounded px-1">
                                                                delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-3">
                                <form class="form-check-inline" action="{{route('comment.store',$post->id)}}"
                                      method="post">
                                    @csrf
                                    <input type="text" name="body" placeholder="add your comment">
                                    <button class="d-inline" type="submit">post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
