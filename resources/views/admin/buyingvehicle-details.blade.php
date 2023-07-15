
@extends('layouts.adminLayout')
@section('content')
<div class="content-wrapper">
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">{{ __('View Vehicle Details') }}</div>
        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                  <h4>
                                    <small class="float-right">Date: {{$vehicle->created_at->format('Y/m/d ')}} <br> Duration: {{$vehicle->created_at->diffForHumans()}}</small>
                                  </h4>
                                </div>
                                <!-- /.col -->
                              </div>
                            <div class="row">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                      Name: <strong>{{$vehicle->seller_name}}</strong><br>
                                      Address: {{$vehicle->seller_address}}<br>
                                      Phone: {{$vehicle->seller_phone}}<br>
                                      Fax: {{$vehicle->seller_fax}}<br>
                                      Email: {{$vehicle->seller_email}}
                                    </address>
                                    <br>
                                    <div class="col-md-12">
                                      <p>Manufacturer Name: {{$vehicle->maker->maker_name}} <img src="{{asset('storage/makers/'.$vehicle->maker->maker_image)}}" style="width:30px;" alt=""></p>
                                      <p>Model Name: {{$vehicle->model_name}}</p>
                                      <p>Model Year: {{$vehicle->model_year}}</p>
                                      <p>Displacement: {{$vehicle->displasement}}</p>
                                      <p>Mileage: {{$vehicle->mileage}}</p>
                                      <p>Chassis Number: {{$vehicle->chassis_no}}</p>
                                      <p style="font-size:16px; color:blue;"><b >Inspection Expiration: {{$vehicle->inspection_expiry_date}}</b></p>
                                      <br>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                @php
                                  $Exploded = explode('|', $vehicle->photos);
                                @endphp
                                @foreach($Exploded as $vehicleImages)
                                  <div class="col-sm-2" >
                                    <a href="{{asset('storage/sell-vehicles/'.$vehicleImages)}}" data-toggle="lightbox"  data-gallery="gallery">
                                      <img style="border-radius:10px;" src="{{asset('storage/sell-vehicles/'.$vehicleImages)}}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    @endsection