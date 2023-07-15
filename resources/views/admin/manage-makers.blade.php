
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    @if (session('status4'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status4') }}
                        </div>
                    @endif
                    @if (session('status5'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status5') }}
                        </div>
                    @endif
                    @if (session('status6'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status6') }}
                        </div>
                    @endif
                   
                    <div class="card">
                        <div class="card-header">{{ __('Add Makers') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{route('store.maker')}}" enctype="multipart/form-data" id="quickFormForMaker" >
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="maker_image" class="col-md-4 col-form-label text-md-end">{{ __('Upload Maker Logo') }}</label>
        
                                    <div class="col-md-6 form-group">
                                            <input id="imgInp" accept="image/*"  name="maker_image" required type="file" class="form-control">
                                            <img id="img" style="width:100px;" src="" alt="" />
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="maker" class="col-md-4 col-form-label text-md-end">{{ __('Maker Name') }}</label>
        
                                    <div class="col-md-6 form-group">
                                        <input id="maker" type="text" class="form-control" name="maker_name" value="{{ old('maker') }}" required autocomplete="Maker Name">
        
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
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
                    <div class="card-header">{{ __('View All Makers') }}</div>

                    <div class="row p-5 table-responsive">

                        <form action="/delete-all-makers" method="POST">
                            @csrf
                            @if(Auth::user()->role == "superAdmin")
                                <input type="submit" class="btn btn-danger mb-4 show_confirm_delete_maker select" id="select" value="Delete"/>
                            @endif
                        <table  id="example1" class="table table display text-nowrap ">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" class="checkAll" id="checkAll"></th>
                                    <th>ID</th>
                                    <th>Maker Name</th>
                                    <th>Maker Logo</th>
                                    @if(Auth::user()->role == "superAdmin")
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($makers as $maker)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="check" class="checkboxClass" name="ids[{{$maker->id}}]" value="{{$maker->id}}">
                                    </td>
                                    <td>{{$maker->id}}</td>
                                    <td>{{$maker->maker_name}}</td>
                                    <td><img src="{{asset('storage/makers/'.$maker->maker_image)}}" style="width: 50px;" alt=""></td>
                                    @if(Auth::user()->role == "superAdmin")
                                    <td>
                                        <a href="{{ route('edit.maker', $maker) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
    

    @endsection