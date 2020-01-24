@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">followings</div>
                    <div class="card-body">
                        <h4>Followings</h4>
                        @foreach($followings as $following)
                            <div><a href="{{route('profile.show',$following->name)}}">{{$following->name}}</a>
                                @can('show',$user)
                                    ---------><a href="{{route('unfollow',$following->name)}}">Unfollow</a>
                                @endcan
                            </div>
                        @endforeach
                        <hr>
                        <div>
                            <h4>Follow Requests</h4>
                            @foreach($follow_requests as $request)
                                <div>
                                    <a href="{{route('profile.show',$request->name)}}">{{$request->name}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
