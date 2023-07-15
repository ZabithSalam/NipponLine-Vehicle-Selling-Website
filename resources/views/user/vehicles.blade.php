@extends('layouts.userLayout')
@section('content')
<hr>

    <main>
        <!-- Search by makers -->

  <section>
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <h3>メーカーによる車両の検索</h3>
            </div>
            <div class="card-body">
                <center>
            <table class="col-xs-12 table-nobordered table-responsive table-striped table-condensed table-fixed">
            <tbody >
                <tr >
                    @if(!$all_makers->isEmpty())
                    @foreach($all_makers as $all_maker)
                            <td class="makerImg"><a href="{{route('searchVehicle', $all_maker)}}"><img src="{{asset('storage/makers/'.$all_maker->maker_image)}}"  style="width:75px;"  alt=""></a></td>
                                             
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

  <section class="featured-places">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h1>すべての車両</h1>
                </div>
            </div> 
        </div>
        @if(!$vehicles->isEmpty()) 
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
                           <a href="{{ route('find.vehicle', $vehicle) }}">もっと見る</a>
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
            <br>
    {{ $vehicles->links() }}
</center>    
</div>

</section>
    </main>
@endsection