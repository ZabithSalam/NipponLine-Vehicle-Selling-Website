
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    
                    <div class="card">
                        <div class="card-header">{{ __('Add Makers') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="/update_maker/{{$maker->id}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
        
                                <div class="row mb-3">
                                    <label for="maker_image" class="col-md-4 col-form-label text-md-end">{{ __('Upload Maker Logo') }}</label>
        
                                    <div class="col-md-6 form-group">
                                            <input id="imgInp" accept="image/*"  name="maker_image"  type="file" class="form-control">
                                            <img id="img" style="width:100px;" src="{{asset('storage/makers/'.$maker->maker_image)}}" alt="" />
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="maker" class="col-md-4 col-form-label text-md-end">{{ __('Maker Name') }}</label>
        
                                    <div class="col-md-6 form-group">
                                        <input id="maker" type="text" class="form-control" name="maker_name" value="{{$maker->maker_name}}"  autocomplete="Maker Name">
        
                                    </div>
                                </div>
        
                                <div class="row mb-0">
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
    </section>

    </div>
    @endsection