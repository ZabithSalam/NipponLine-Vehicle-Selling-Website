
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    @error('vehicle_image')
                         <div class="alert alert-danger mt-5">{{ $message }}</div>
                    @enderror
                    <div class="card">
                        <div class="card-header">{{ __('Add Vehicle') }}</div>
        
                        <div class="card-body">
                            <form action="/update_vehicle/{{$vehicle->id}}" method="post" enctype="multipart/form-data" id="quickForm">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Name</label>
                                        <input  type="text" class="form-control" name="vehicle_name" value="{{$vehicle->vehicle_name}}"  placeholder=" Name">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Price</label>
                                        <input  type="text" class="form-control" name="vehicle_price" value="{{$vehicle->vehicle_price}}"  placeholder=" Price">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Model & year</label>
                                        <input  type="text" class="form-control" name="vehicle_model_year" value="{{$vehicle->vehicle_model_year}}"  placeholder=" Model & year">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Maker</label>
                                            <select name="vehicle_maker_id" class="form-control" id="vehicle_maker_id" >

                                                <option value="{{$vehicle->maker->id}}">{{$vehicle->maker->maker_name}}</option>
                                                @foreach($makers as $maker)
                                                    @if($vehicle->maker->maker_name == $maker->maker_name)

                                                    @else
                                                        <option value="{{$maker->id}}">{{$maker->maker_name}}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Displasement</label>
                                        <input  type="text" class="form-control" name="vehicle_displacement" value="{{ $vehicle->vehicle_displacement }}"  placeholder=" Displacement">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Mileage (Km)</label>
                                        <input  type="text" class="form-control" name="vehicle_Mileage" value="{{ $vehicle->vehicle_Mileage }}"  placeholder=" Mileage">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle inspection</label>
                                        <input  type="text" class="form-control" name="vehicle_inspection" value="{{ $vehicle->vehicle_inspection }}"  placeholder=" Inspection">
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="">Vehicle Repire History</label>
                                        <input  type="text" class="form-control" name="vehicle_repire_history" value="{{ $vehicle->vehicle_repire_history }}"  placeholder=" Rapire History">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Body Color</label>
                                        <input  type="text" class="form-control" name="vehicle_body_color" value="{{ $vehicle->vehicle_body_color }}"  placeholder=" Body Color">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Riding Capacity</label>
                                        <input  type="text" class="form-control" name="vehicle_riding_capacity" value="{{ $vehicle->vehicle_riding_capacity }}"  placeholder=" Riding Capacity">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Transmission</label>
                                        <input  type="text" class="form-control" name="vehicle_transmission" value="{{ $vehicle->vehicle_transmission }}"  placeholder=" Transmission">
                                    </div>
                                   
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Legal Inspection</label>
                                        <input  type="text" class="form-control" name="vehicle_legal_inspection" value="{{ $vehicle->vehicle_guarantee }}"  placeholder=" Legal Inspection">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Guarantee</label>
                                        <input  type="text" class="form-control" name="vehicle_guarantee" value="{{ $vehicle->vehicle_guarantee }}"  placeholder=" Guarantee">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Is vehicle registered un used</label>
                                        <input  type="text" class="form-control" name="vehicle_registered_un_used" value="{{ $vehicle->vehicle_registered_un_used }}"  placeholder=" vehicle registered un used">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Recycling Deposite</label>
                                        <input  type="text" class="form-control" name="vehicle_recycling_deposite" value="{{ $vehicle->vehicle_recycling_deposite }}"  placeholder=" Recycling Deposite">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Import Route</label>
                                        <input  type="text" class="form-control" name="vehicle_import_route" value="{{ $vehicle->vehicle_import_route }}"  placeholder=" Import Route">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Body Type</label>
                                        <input  type="text" class="form-control" name="vehicle_body_type" value="{{ $vehicle->vehicle_body_type }}"  placeholder=" vehicle body type">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">Steering Side</label>
                                        <input  type="text" class="form-control" name="vehicle_steering" value="{{ $vehicle->vehicle_steering }}"  placeholder=" Steering">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Chassis No</label>
                                        <input  type="text" class="form-control" name="vehicle_chassis_no" value="{{ $vehicle->vehicle_chassis_no }}"  placeholder=" Chassis Number">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Engine Type</label>
                                        <input  type="text" class="form-control" name="vehicle_engine_type" value="{{ $vehicle->vehicle_engine_type }}"  placeholder=" Engine Type">
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 form-group">
                                        <label for="">No Of Doors</label>
                                        <input  type="text" class="form-control" name="vehicle_no_of_doors" value="{{ $vehicle->vehicle_no_of_doors }}"  placeholder=" No Of Doors">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle Wheight</label>
                                        <input  type="text" class="form-control" name="vehicle_wheight" value="{{ $vehicle->vehicle_wheight }}"  placeholder=" Vehicle Wheight">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Body dimensions (length x width x height)</label>
                                        <input  type="text" class="form-control" name="vehicle_body_dimension" value="{{ $vehicle->vehicle_body_dimension }}"  placeholder=" Vehicle Body Dimension">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Vehicle Type</label>
                                        <input  type="text" class="form-control" name="vehicle_type" value="{{ $vehicle->vehicle_type }}"  placeholder=" Vehicle Type">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                   
                                    <div class="col-md-12 form-group">
                                        <label for="">Vehicle Description</label>

                                        <textarea id="summernote" name="description" rows="4" >
                                            {{ $vehicle->description }}
                                          </textarea>

                                    </div>
                                  
                                </div>
                                <div class="row mb-3">
                                   
                                    <div class="col-md-4 form-group">
                                        <label for="">Vehicle use</label>
                                        <input  type="text" class="form-control" name="use" value="{{ $vehicle->use }}"  placeholder=" Vehicle use">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Upload Vehicle Photos</label>
                                        <input type="file" name="vehicle_image[]" class="form-control" id="images" multiple="multiple">
                                       
                                    </div>
                                    <div class="user-image mb-3 text-center">
                                        @php
                                          $Exploded = explode('|', $vehicle->vehicle_image);
                                        @endphp
                                                <div class="imgPreview" > </div>
                                            <div id="mydev">
                                            @foreach($Exploded as $vehicleImages)
                                                <img id="vehicleimage" src="{{asset('storage/vehicles/'.$vehicleImages)}}" alt="" style="width: 70px">
                                            @endforeach
                                            </div>

                                    </div> 
                                </div>
        
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Update Vehicle') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
    @endsection