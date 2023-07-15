@extends('layouts.adminLayout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Registered Admin') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="/update_user/{{$user->id}}">
                                @csrf
                                @method('PUT')
                                @if (session('status3'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status3') }}
                                    </div>
                                @endif
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input  type="hidden" class="form-control" name="email_verified_at" value="">
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                <center>
                                    <div class="col-md-6">
                                        @if( $user->role == "superAdmin")
                                          <input type="radio" name="role" checked value="superAdmin"> Super Admin &nbsp;
                                          <input type="radio" name="role" value="admin"> Admin
                                          @else
                                          <input type="radio" name="role" value="superAdmin"> Super Admin &nbsp;
                                          <input type="radio" name="role" checked value="admin"> Admin
                                        @endif
                                    </div>
                                </center>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="update" class="btn btn-warning">
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
    </section>
   
  </div>
  
 @endsection