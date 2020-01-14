@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    <div class="card-body row justify-content-center">
                        <div class="col-md-7 justify-content-center">
                            <img src="{{asset('storage/posts/'.$post->media->name)}}"
                                 alt="post"
                                 style="max-width: 100%; max-height: 100%">
                        </div>
                        <div class="col-xs-1 mx-2 border-left border-secondary"></div>
                        <div class="col-md-4 justify-content-center">
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
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('update',$post))
                                        <li>
                                            <button class="btn">
                                                <a href="{{ route('post.edit' , ['post' => $post->id]) }}"
                                                   class="font-weight-bold border rounded text-dark text-decoration-none p-1">Edit</a>
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('post.destroy' , ['post' => $post->id ]) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="delete" class="btn btn-outline-danger font-weight-bold border rounded">Delete
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
