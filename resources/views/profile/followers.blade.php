@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">followers</div>
                    <div class="card-body">
                        <h4>Followers</h4>
                        @foreach($followers as $follower)
                            <div>
                                <a href="{{route('profile.show',$follower->username)}}">{{$follower->username}}</a>
                            </div>
                        @endforeach
                        <hr>
                        <div>
                            <h4>Follow Requests</h4>
                            @foreach($follow_requests as $request)
                                <div>
                                    <a href="{{route('profile.show',$request->username)}}">{{$request->username}}</a>
                                    @can('show',$user)
                                        --------><a href="{{route('accept_follow_request',$request->username)}}">Accept</a>
                                    @endcan
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
