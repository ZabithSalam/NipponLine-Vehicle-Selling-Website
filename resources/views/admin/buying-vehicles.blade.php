
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                @if (session('status11'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status11') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('View All Buying Vehicles') }}</div>
                    
                    <div class="row p-5">
                        
                        <form action="/delete-all-Buying-vehicle" method="POST" id="deleteForm">
                            @csrf
                            @if(Auth::user()->role == "superAdmin")
                                <input type="submit" class="btn btn-danger mb-4 show_confirm_delete_selling_vehicle select" id="select" value="Delete"/>
                            @endif
                        <table id="example2" class="display text-nowrap table table-responsive">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" class="checkAll" id="checkAll"></th>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Manufacturer</th>
                                    <th>Model Name</th>
                                    <th>ModelYear</th>
                                    <th>Posted</th>
                                    <th>Read at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($buying_vehicles as $vehicles)
                                      @php
                                        $Exploded = explode('|', $vehicles->photos);
                                      @endphp
                                <tr >
                                    <td>
                                       
                                            <input type="checkbox" class="checkboxClass " id="check" name="ids[{{$vehicles->id}}]" value="{{$vehicles->id}}">
                                       
                                    </td>
                                    <td>
                                        @if($vehicles->read_at == null)
                                            <span class="badge badge-danger" style="font-size:14px;">New</span>
                                        @endif
                                    </td>
                                    <td>{{$vehicles->id}}</td>
                                    <td style="text-align: center"><img src="{{asset('storage/makers/'.$vehicles->maker->maker_image)}}" style="width:45px;" alt=""></td>
                                    <td>{{$vehicles->model_name}}</td>
                                    <td>{{$vehicles->model_year}}</td>
                                    <td>{{$vehicles->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($vehicles->read_at != null)
                                            {{$vehicles->read_at}}
                                        @else
                                            Not readed
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('findBuyingVehicle', $vehicles->id)}}" class="btn btn-success" >View full Details</a>
                                    </td>
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