@extends('layouts.app')

@section('content')

    <header class="row justify-content-sm-center">
        <div class="col-md-2">
            <img class="rounded-circle" style="width: 150px; height: 150px"
                 src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar">
        </div>
        <section class="col-md-6 pt-4 ml-5">
            <div class="row pl-4">
                <h1 class="">{{$user->username}}</h1>
                @can('show',$user)
                    <button class="btn btn-outline-light "><a
                            class="font-weight-bold border rounded text-dark text-decoration-none p-1"
                            href={{route('account.edit')}}>Edit Profile</a>
                    </button>
                @endcan
            </div>
            <ul class="list-unstyled list-group list-group-horizontal">
                <li class="p-3 bg-light"><span><span class="mr-1">0</span>posts</span></li>
                <li class="p-3 bg-light"><span><span class="mr-1">0</span>followers</span></li>
                <li class="p-3 bg-light"><span><span class="mr-1">0</span>following</span></li>
            </ul>
        </section>
    </header>
    <hr style="border-top: 1px solid #8c8c8c">

    <div>
        <div class="row justify-content-center">
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
        </div>
        <div class="row justify-content-center">
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
        </div>
        <div class="row justify-content-center">
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
        </div>
        <div class="row justify-content-center">
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
            <div class="ml-1 mb-1" style="width: 19%;"><img style="max-width: 100%; max-height: 100%"
                                                            src="{{\Illuminate\Support\Facades\Storage::url('public/avatars/'.$avatar)}}" alt="avatar"></div>
        </div>
    </div>
@endsection
