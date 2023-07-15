@extends('layouts.userLayout')
@section('content')
<hr>

    <main>
        <section class="featured-places">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-xs-12">
                <h2>BMW MINI ミニ クーパー クラシックトリム</h2>  
                <div>
                  @php
                  $Exploded = explode('|', $vehicle->vehicle_image);
                @endphp
                      @foreach($Exploded as $vehicleImages)
                          @if ($loop->first)
                             <img src="{{asset('storage/vehicles/'.$vehicleImages)}}" alt="" class="img-responsive wc-image">
                          @endif
                      @endforeach
                    </div>
                    <br>
                    <div class="row">
                      @foreach($Exploded as $vehicleImages)
                              <div class="col-sm-4 col-xs-6">
                                <div class="form-group">
                                   <a href="{{asset('storage/vehicles/'.$vehicleImages)}}" data-toggle="lightbox"  data-gallery="gallery">
                                        <img  src="{{asset('storage/vehicles/'.$vehicleImages)}}" class="img-fluid mb-2" alt="white sample"/>
                                      </a>
                                </div>
                              </div>
                      @endforeach


                    </div>
                  </div>

                  <div class="col-md-6 col-xs-12">
                    <form action="#" method="post" class="form">
                      <h3>車両本体価格 (税込):<strong class="text-primary">{{$vehicle->vehicle_price}}</strong></h3>

                      <br> 

                      <ul class="list-group list-group-flush table-bordered">
                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">年式</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_model_year}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">銘柄</span>

                                 <strong class="pull-right">{{$vehicle->maker->maker_name}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left"> 排気量</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_displacement}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">走行</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_Mileage}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">車検</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_inspection}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">修復歴</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_repire_history}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">車体色</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_body_color}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">ミッション</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_transmission}}</strong>
                            </div>
                       </li>


                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">乗車定員</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_riding_capacity}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">法定点検</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_legal_inspection}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">保証</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_guarantee}}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">登録済未使用車</span>

                                 <strong class="pull-right">{{$vehicle->vehicle_registered_un_used}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">リサイクル預託金</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_recycling_deposite}}</strong>
                            </div>
                        </li>


                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">輸入経路</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_import_route}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">ボディタイプ</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_body_type}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">ハンドル</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_steering}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">車台番号</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_chassis_no}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">エンジン種別</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_engine_type}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">ドア数	</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_no_of_doors}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">車両重量</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_wheight}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">車体寸法(全長×全幅×全高)</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_body_dimension}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">自動車の種別</span>
                            
                                 <strong class="pull-right">{{$vehicle->vehicle_type}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">用途</span>
                            
                                 <strong class="pull-right">{{$vehicle->use}}</strong>
                            </div>
                        </li>
                    </ul>

                      <div class="accordions">
                            <ul class="accordion">
                                <li>
                                    <a class="accordion-trigger">車両の説明</a>
                                       <div class="accordion-content">
                                         <p>{!! $vehicle->description !!}</p>
                                       </div>
                                </li>
                                <li>
                                    <a class="accordion-trigger">販売店情報</a>

                                    <div class="accordion-content">

                                      <p>
                                        <span>名前</span>

                                        <br>

                                        <strong>ニッポンライン株式会社 (Nippon Line Co.Ltd)</strong>

                                    </p>
                                    <p>
                                        <span>住所</span>

                                        <br>

                                        <strong>神奈川県厚木市下川入338-1</strong>

                                    </p>
                                    <p>
                                        <span>営業時間</span>

                                        <br>

                                        <strong>09:00 - 18:00</strong>

                                    </p>
                                    <p>
                                        <span>Free Dial</span>

                                        <br>
                                        
                                        <strong>
                                          <a href="tel:456789123">0120663740</a>
                                        </strong>
                                    </p>
                                    <p>
                                        <span>Tel</span>

                                        <br>
                                        
                                        <strong>
                                          <a href="tel:456789123">046-259-5441</a>
                                        </strong>
                                    </p>
                                    <p>
                                        <span>Fax</span>

                                        <br>
                                        
                                        <strong>
                                          <a href="tel:456789123">046-205-4255</a>
                                        </strong>
                                    </p>
                                    <p>

                                        <span>Email</span>

                                        <br>
                                        
                                        <strong>
                                          <a href="#">nipponlineco@gmail.com</a>
                                        </strong>
                                      </p>
                                    </div>
                                </li>
                            </ul> <!-- / accordion -->
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </section>
    </main>
@endsection