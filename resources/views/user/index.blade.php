@extends('layouts.userLayout')
@section('content')
    
    <!-- Banner -->

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="10000">
            <section class="banner" id="top" style="background-image: url(img/banner1.jpeg);">
                <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2>最高の日本中古車と新車を探す</h2>
                            <div class="blue-button">
                                <a href="contact.php">お問い合わせ</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
           </div>

           <div class="carousel-item" data-interval="10000">
            <section class="banner" id="top" style="background-image: url(img/banner2.jpeg);">
                <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2>最高の日本中古車と新車を探す</h2>
                            <div class="blue-button">
                                <a href="contact.php">お問い合わせ</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
           </div>

           <div class="carousel-item" data-interval="10000">
            <section class="banner" id="top" style="background-image: url(img/banner3.jpeg);">
                <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2>最高の日本中古車と新車を探す</h2>
                            <div class="blue-button">
                                <a href="contact.php">お問い合わせ</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
           </div>
        </div>

    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
    </a>

</div>

<!-- Search by makers -->

  <section>
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <h3>メーカーによる車両の検索</h3>
            </div>
            <div class="card-body">
                <center>
            <table class=" col-xs-12 table-nobordered table-responsive table-striped table-condensed table-fixed">
            <tbody >
                <tr>
                    @if(!$makers->isEmpty())
                        @foreach($makers as $maker)
                            <td class="makerImg"><a href="{{route('searchVehicle', $maker)}}"><img src="{{asset('storage/makers/'.$maker->maker_image)}}"  style="width:75px;"  alt=""></a></td>
                        @endforeach
                    @else
                    <center><h2>リストされていないメーカー</h2></center>
                    @endif
                </tr>
                
            </tbody>
            </table>
        </center>
        </div>
    </div>

    </div> 
  </section>

    <main>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h1>新着</h1>
                        </div>
                    </div> 
                </div> 
                @if(!$new_vehicles->isEmpty())
                <div class="row">

                     @foreach($new_vehicles as $new_vehicle)
                     @php
                       $Exploded = explode('|', $new_vehicle->vehicle_image);
                     @endphp
                    <div class="col-md-3 col-sm-4" >
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    @foreach($Exploded as $vehicleImages)
                                        @if ($loop->first)
                                           <img src="{{asset('storage/vehicles/'.$vehicleImages)}}" >
                                        @endif
                                    @endforeach
                                </div>
                               
                            </div>
                            <div class="down-content">
                                <h4>{{$new_vehicle->vehicle_name}}</h4>

                                <p> <img src="{{asset('storage/makers/'.$new_vehicle->maker->maker_image)}}" style="width:40px;" alt="">{{$new_vehicle->maker->maker_name}} /  {{$new_vehicle->vehicle_displacement}}  / {{$new_vehicle->vehicle_model_year}} / <i class="fa fa-dashboard"></i> {{$new_vehicle->vehicle_Mileage}}</p>
                                <h4 style="margin-bottom: 10px">価格: {{$new_vehicle->vehicle_price}}</h4>
                                
                                <div class="text-button">
                                    <a href="{{route('find.vehicle', $new_vehicle)}}">もっと見る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                @else
                        <center><h2>記載されていない車両</h2></center>
            @endif
                    <center>
                        <div class="blue-button mt-5">
                            <a href="{{route('vehicles')}}">もっと見る</a>
                        </div>
                    </center>
                </div>

        </section>


        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h1>現物</h1>
                        </div>
                    </div> 
                </div> 
                @if(!$new_vehicles->isEmpty())
                <div class="row">
                    @foreach($vehicles as $vehicle)
                     @php
                       $Exploded = explode('|', $vehicle->vehicle_image);
                     @endphp
                    <div class="col-md-3 col-sm-4" >
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    @foreach($Exploded as $vehicleImages)
                                        @if ($loop->first)
                                           <img src="{{asset('storage/vehicles/'.$vehicleImages)}}" >
                                        @endif
                                    @endforeach
                                </div>
                               
                            </div>
                            <div class="down-content">
                                <h4>{{$vehicle->vehicle_name}}</h4>

                                <p> <img src="{{asset('storage/makers/'.$vehicle->maker->maker_image)}}" style="width:40px;" alt="">{{$vehicle->maker->maker_name}} /  {{$vehicle->vehicle_displacement}}  / {{$vehicle->vehicle_model_year}} / <i class="fa fa-dashboard"></i> {{$vehicle->vehicle_Mileage}}</p>
                                <h4 style="margin-bottom: 10px">価格: {{$vehicle->vehicle_price}}</h4>
                                
                                <div class="text-button">
                                    <a href="{{route('find.vehicle', $vehicle)}}">もっと見る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div> 

                        
                </div>

              
            </div>
            @else
                <center><h2>記載されていない車両</h2></center>
            @endif
            <center>
                <div class="blue-button mt-5">
                    <a href="{{route('vehicles')}}">もっと見る</a>
                </div>
            </center>
        </section>
       
    <!-- Advertisement -->

    <section class="featured-places">
        <div class="container">
            <center>
            <div class="row">
                @foreach($ads as $ad)
                <div class="col-md-6 col-sm-4" >
                    <div class="featured-item">
                            <img src="{{asset('storage/advertisements/'.$ad->banner_ad)}}" style="width:350px;" alt="">
                    </div>
                </div>
                @endforeach
            </div>
            </center>
        </div>
    </section>


        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Contact Us</span>
                          <h2>あなたの夢の車のために</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="blue-button">
                        <a href="{{route('contact')}}">お問い合わせ</a>
                      </div>
                </div>
            </div>
        </section>

        
    </main>

    @endsection