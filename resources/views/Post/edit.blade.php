@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body justify-content-center">
                        <div class="row justify-content-center mb-4">
                            <img src="{{asset('storage/media/'.$post->media->name)}}"
                                 alt="post"
                                 style="max-width: 100%; max-height: 100%">
                        </div>
                        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="caption"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>
                                <div class="col-md-6">
                                    <textarea id="name" type="text"
                                              class="form-control @error('caption') is-invalid @enderror" name="caption"
                                              autofocus>{{$post->body}}</textarea>
                                    @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tags"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>
                                <div class="col-md-6">
                                    <input id="tags" type="text" value="{{$post->tags->name ?? ''}}"
                                           class="form-control @error('tags') is-invalid @enderror" name="tags"
                                           autofocus>
                                    @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="captcha"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Captcha') }}</label>
                                <div class="col-md-6">
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                    <span class="help-block" style="color: #e3342f">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
