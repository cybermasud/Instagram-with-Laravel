@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$user->name}}
{{--todo: can edit--}}
                        <span><a href={{route('account.edit')}}>Edit Profile</a></span>
                    </div>
                    <div>
                        <img src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
