@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$user->name}}
                        <span><a href={{route('account.edit')}}>Edit Profile</a></span>
                    </div>
                    <div>
                        <img src="" alt="avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
