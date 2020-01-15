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
                    <div class="card-header">New Post</div>
                    <div class="card-body">
                        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="caption"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>
                                <div class="col-md-6">
                                    <textarea id="name" type="text"
                                              class="form-control @error('caption') is-invalid @enderror" name="caption"
                                              autocomplete="name" autofocus>
                                    </textarea>
                                    @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Your Post') }}</label>
                                <div class="col-md-6">
                                    <input id="post" type="file"
                                           class="form-control-file @error('post') is-invalid @enderror"
                                           name="img">

                                    @error('post')
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
                                        {{ __('Post') }}
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
