
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    @if (session('status8'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status8') }}
                        </div>
                    @endif
                    @if (session('status9'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status9') }}
                        </div>
                    @endif
                    @if (session('status10'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status10') }}
                        </div>
                    @endif
                    @error('vehicle_image')
                         <div class="alert alert-danger mt-5">{{ $message }}</div>
                    @enderror
                    <div class="card">
                        <div class="card-header">{{ __('Add Vehicle') }}</div>
        
                        <div class="card-body">
                            <form action="{{route('store.vehicle')}}" method="post" enctype="multipart/form-data" id="quickForm">
                                @csrf
        
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Name</label>
                                        <input  type="text" class="form-control" name="vehicle_name" value="{{ old('vehicle_name') }}"  placeholder=" Name">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Price</label>
                                        <input  type="text" class="form-control" name="vehicle_price" value="{{ old('vehicle_price') }}"  placeholder=" Price">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Model & year</label>
                                        <input  type="text" class="form-control" name="vehicle_model_year" value="{{ old('vehicle_price') }}"  placeholder=" Model & year">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Maker</label>
                                        <select name="vehicle_maker_id" class="form-control" id="vehicle_maker_id" >
                                                <option value="">Select Makers</option>
                                                @foreach($makers as $maker)
                                                    <option value="{{$maker->id}}">{{$maker->maker_name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Displasement</label>
                                        <input  type="text" class="form-control" name="vehicle_displacement" value="{{ old('vehicle_displacement') }}"  placeholder=" Displacement">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Mileage (Km)</label>
                                        <input  type="text" class="form-control" name="vehicle_Mileage" value="{{ old('vehicle_Mileage') }}"  placeholder=" Mileage">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle inspection</label>
                                        <input  type="text" class="form-control" name="vehicle_inspection" value="{{ old('vehicle_inspection') }}"  placeholder=" Inspection">
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="">Vehicle Repire History</label>
                                        <input  type="text" class="form-control" name="vehicle_repire_history" value="{{ old('vehicle_rapire_history') }}"  placeholder=" Rapire History">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Body Color</label>
                                        <input  type="text" class="form-control" name="vehicle_body_color" value="{{ old('vehicle_body_color') }}"  placeholder=" Body Color">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Riding Capacity</label>
                                        <input  type="text" class="form-control" name="vehicle_riding_capacity" value="{{ old('vehicle_riding_capacity') }}"  placeholder=" Riding Capacity">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Transmission</label>
                                        <input  type="text" class="form-control" name="vehicle_transmission" value="{{ old('vehicle_transmission') }}"  placeholder=" Transmission">
                                    </div>
                                   
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Legal Inspection</label>
                                        <input  type="text" class="form-control" name="vehicle_legal_inspection" value="{{ old('vehicle_legal_inspection') }}"  placeholder=" Legal Inspection">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Guarantee</label>
                                        <input  type="text" class="form-control" name="vehicle_guarantee" value="{{ old('vehicle_guarantee') }}"  placeholder=" Guarantee">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Is vehicle registered un used</label>
                                        <input  type="text" class="form-control" name="vehicle_registered_un_used" value="{{ old('vehicle_registered_un_used') }}"  placeholder=" vehicle registered un used">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Recycling Deposite</label>
                                        <input  type="text" class="form-control" name="vehicle_recycling_deposite" value="{{ old('vehicle_recycling_deposite') }}"  placeholder=" Recycling Deposite">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Import Route</label>
                                        <input  type="text" class="form-control" name="vehicle_import_route" value="{{ old('vehicle_import_route') }}"  placeholder=" Import Route">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Body Type</label>
                                        <input  type="text" class="form-control" name="vehicle_body_type" value="{{ old('vehicle_body_type') }}"  placeholder=" vehicle body type">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Steering Side</label>
                                        <input  type="text" class="form-control" name="vehicle_steering" value="{{ old('vehicle_steering') }}"  placeholder=" Steering">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Chassis No</label>
                                        <input  type="text" class="form-control" name="vehicle_chassis_no" value="{{ old('vehicle_chassis_no') }}"  placeholder=" Chassis Number">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Engine Type</label>
                                        <input  type="text" class="form-control" name="vehicle_engine_type" value="{{ old('vehicle_engine_type') }}"  placeholder=" Engine Type">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">No Of Doors</label>
                                        <input  type="text" class="form-control" name="vehicle_no_of_doors" value="{{ old('vehicle_no_of_doors') }}"  placeholder=" No Of Doors">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Wheight</label>
                                        <input  type="text" class="form-control" name="vehicle_wheight" value="{{ old('vehicle_wheight') }}"  placeholder=" Vehicle Wheight">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Body dimensions (length x width x height)</label>
                                        <input  type="text" class="form-control" name="vehicle_body_dimension" value="{{ old('vehicle_body_dimension') }}"  placeholder=" Vehicle Body Dimension">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Vehicle Type</label>
                                        <input  type="text" class="form-control" name="vehicle_type" value="{{ old('vehicle_type') }}"  placeholder=" Vehicle Type">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                   
                                    <div class="col-md-12 form-group">
                                        <label for="">Vehicle Description</label>

                                        <textarea id="summernote" name="description" rows="4" >
                                          </textarea>

                                    </div>
                                  
                                </div>
                                <div class="row mb-3">
                                   
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle use</label>
                                        <input  type="text" class="form-control" name="use" value="{{ old('use') }}"  placeholder=" Vehicle use">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Upload Vehicle Photos</label>
                                        <input type="file" name="vehicle_image[]" class="form-control" id="images" required multiple="multiple">
                                       
                                    </div>
                                   
                                    <div class="user-image mb-3 text-center">
                                        <div class="imgPreview"> </div>
                                    </div> 
                                </div>
        
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Vehicle') }}
                                </button>
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
                    <div class="card-header">{{ __('View All Vehicles') }}</div>

                    <div class="row p-5">
                        <form action="/delete-all-vehicle" method="POST">
                            @csrf
                            @if(Auth::user()->role == "superAdmin")
                                <input type="submit" class="btn btn-danger mb-4 show_confirm_delete_vehicle select" id="select" value="Delete"/>
                            @endif
                        <table id="VehiclesTable" class="display text-nowrap table table-responsive">
                            <thead>
                                <tr>
                                    <th width="50px"><input type="checkbox" class="checkAll" id="checkAll"></th>
                                    <th>ID</th>
                                    <th>Photos</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Price</th>
                                    <th>Model & Year</th>
                                    <th>Maker</th>
                                    <th>Displasement</th>
                                    <th>Mileage (Km)</th>
                                    <th>Vehicle inspection</th>
                                    <th>Vehicle Repire History</th>
                                    <th>Body Color</th>
                                    <th>Riding Capacity</th>
                                    <th>Transmission</th>
                                    <th>Legal Inspection</th>
                                    <th>Guarantee</th>
                                    <th>is Registered Un used</th>
                                    <th>Recycling Deposite</th>
                                    <th>Vehicle Import Route</th>
                                    <th>Body Type</th>
                                    <th>Steering Side</th>
                                    <th>Chassis No</th>
                                    <th>Engine Type</th>
                                    <th>No Of Doors</th>
                                    <th>Vehicle Wheight</th>
                                    <th>Body dimensions</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle use</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    @if(Auth::user()->role == "superAdmin")
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                    @php
                                      $Exploded = explode('|', $vehicle->vehicle_image);
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="check" class="checkboxClass" name="ids[{{$vehicle->id}}]" value="{{$vehicle->id}}">
                                        </td>
                                        <td>{{$vehicle->id}}</td>
                                        <td>
                                            @foreach($Exploded as $vehicleImages)
                                            <img src="{{asset('storage/vehicles/'.$vehicleImages)}}" alt="" style="width: 50px">
                                            @endforeach
                                        </td>
                                        <td>{{$vehicle->vehicle_name}}</td>
                                        <td>{{$vehicle->vehicle_price}}</td>
                                        <td>{{$vehicle->vehicle_model_year}}</td>
                                        <td>{{$vehicle->maker->maker_name}}</td>
                                        <td>{{$vehicle->vehicle_displacement}}</td>
                                        <td>{{$vehicle->vehicle_Mileage}}</td>
                                        <td>{{$vehicle->vehicle_inspection}}</td>
                                        <td>{{$vehicle->vehicle_repire_history}}</td>
                                        <td>{{$vehicle->vehicle_body_color}}</td>
                                        <td>{{$vehicle->vehicle_riding_capacity}}</td>
                                        <td>{{$vehicle->vehicle_transmission}}</td>
                                        <td>{{$vehicle->vehicle_legal_inspection}}</td>
                                        <td>{{$vehicle->vehicle_guarantee}}</td>
                                        <td>{{$vehicle->vehicle_registered_un_used}}</td>
                                        <td>{{$vehicle->vehicle_recycling_deposite}}</td>
                                        <td>{{$vehicle->vehicle_import_route}}</td>
                                        <td>{{$vehicle->vehicle_body_type}}</td>
                                        <td>{{$vehicle->vehicle_steering}}</td>
                                        <td>{{$vehicle->vehicle_chassis_no}}</td>
                                        <td>{{$vehicle->vehicle_engine_type}}</td>
                                        <td>{{$vehicle->vehicle_no_of_doors}}</td>
                                        <td>{{$vehicle->vehicle_wheight}}</td>
                                        <td>{{$vehicle->vehicle_body_dimension}}</td>
                                        <td>{{$vehicle->vehicle_type}}</td>
                                        <td>{{$vehicle->use}}</td>
                                        <td>{{$vehicle->created_at}}</td>
                                        <td>{{$vehicle->updated_at}}</td>
                                        @if(Auth::user()->role == "superAdmin")
                                        <td>
                                            <a href="{{ route('edit.vehicle', $vehicle) }}" class="btn btn-success">Edit</a>
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