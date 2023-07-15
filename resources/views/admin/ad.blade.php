
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">{{ __('Add Advertisement') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{route('store.ad')}}" enctype="multipart/form-data" id="quickFormForAd">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="maker_image" class="col-md-4 col-form-label text-md-end">{{ __('Upload Banner Ads') }}</label>
        
                                    <div class="col-md-6 form-group">
                                            <input id="imgInp" accept="image/*"  name="banner_ad" required type="file" class="form-control">
                                            <img id="img" style="width:100px;" src="" alt="" />
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Publish') }}
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


<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('View All Advertisements') }}</div>

                    <div class="row p-5  table-responsive ">
                        <table id="AdTable" class="display text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Banner Ad</th>
                                    <th>Created at</th>
                                    @if(Auth::user()->role == "superAdmin")
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ads as $advertisement)
                                    <tr>
                                        <td>{{$advertisement->id}}</td>
                                        <td><img src="{{asset('storage/advertisements/'.$advertisement->banner_ad)}}" style="width: 50px;" alt=""></td>
                                        <td>{{$advertisement->created_at}}</td>
                                        @if(Auth::user()->role == "superAdmin")
                                        <td>
                                            <form method="POST" action="{{ route('delete.ad', $advertisement->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger show_confirm_delete_ad">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>

    
    @endsection