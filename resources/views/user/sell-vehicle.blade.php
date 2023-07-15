@extends('layouts.userLayout')
@section('content')
<hr>

<div class="container">
  <form action="{{route('store.sell-vehicle')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-md-12">
          @if (session('status1'))
              <div class="alert alert-success" role="alert">
                  {{ session('status1') }}
              </div>
          @endif
          @error('photos')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
            <div class="section-heading">
                <h1>車両を売る</h1>
          <p>このフォームを送信することにより、あなたは私たちにあなたの車を売ることができます。それから私達はあなたの車を買うために現場であなたの車を検査します。</p>
        </div>
        </div> 
    </div> 
    <div class="card">
        <div class="card-header">
          <h3>お客様情報</h3>
        </div>
        <div class="card-body">
                <div class="form-row">

                  <div class="form-group col-md-4">
                    <label>あなたのメール</label>
                  <input type="text" class="form-control @error('seller_email') is-invalid @enderror" name="seller_email" value="{{old('seller_email')}}"  placeholder="あなたのメール">
                    @error('seller_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label >名前</label>
                    <input type="text" class="form-control @error('seller_name') is-invalid @enderror" name="seller_name" value="{{old('seller_name')}}"  placeholder="名前">
                        @error('seller_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label >電話</label>
                    <input type="text" class="form-control @error('seller_phone') is-invalid @enderror" value="{{old('seller_phone')}}" name="seller_phone"  placeholder="電話">
                        @error('seller_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label >ファクス(オプション) Fax (optional)</label>
                    <input type="text" class="form-control" name="seller_fax" value="{{old('seller_fax')}}"  placeholder="ファクス Fax">
                        
                  </div>

                </div>

                <div class="form-group">

                  <label>住所</label>
                       
                        <input type="address" class="form-control @error('seller_address') is-invalid @enderror" value="{{old('seller_address')}}" name="seller_address" placeholder="住所">
                        @error('seller_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                
       </div>
    </div>

    <div class="card">
        <div class="card-header">
          <h3>車両詳細</h3>
        </div>
        <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="">メーカー名</label>
                       
                        <select name="maker_id" class="form-control @error('maker_id') is-invalid @enderror"  id="maker_id" >
                              <option value="">メーカーを選択</option>
                              @foreach($makers as $maker)
                                      <option value="{{$maker->id}}">{{$maker->maker_name}}</option>
                              @endforeach
  
                          </select>
                          @error('maker_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                    <div class="form-group col-md-6">
                      <label >車種名</label>
                      <input type="text" class="form-control @error('model_name') is-invalid @enderror" value="{{old('model_name')}}" name="model_name" placeholder="車種名">
                          @error('model_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                      <label >年式</label>
                      <input type="text" class="form-control @error('model_year') is-invalid @enderror" value="{{old('model_year')}}" name="model_year" placeholder="年式">
                          @error('model_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>排気量</label>
                      <input type="text" class="form-control @error('displasement') is-invalid @enderror" value="{{old('displasement')}}" name="displasement" placeholder="排気量">
                          @error('displasement')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                      <label>走行距離</label>
                      <input type="text" class="form-control @error('mileage') is-invalid @enderror" value="{{old('mileage')}}" name="mileage" placeholder="走行距離">
                          @error('mileage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>車台番号</label>
                      <input type="text" class="form-control @error('chassis_no') is-invalid @enderror" value="{{old('chassis_no')}}" name="chassis_no" placeholder="車台番号">
                          @error('chassis_no')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label >車検満了日</label>
                      <input type="date" name="inspection_expiry_date" value="{{old('inspection_expiry_date')}}" class="form-control @error('inspection_expiry_date') is-invalid @enderror">
                          @error('inspection_expiry_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group" >
                  <center >
                   
                     <div class="upload-btn-wrapper" >
                      <button class="uploadbtn">車両の写真をアップロードする</button>
                      <input  type="file" class="@error('photos') is-invalid @enderror" name="photos[]" id="images" multiple/>
                      @error('photos')
                          <div class="alert alert-danger mt-5">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="user-image mb-3 text-center">
                      <div class="imgPreview"> </div>
                  </div>    
                  <center>
                    
                  <br>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">

                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}

                        @error('g-recaptcha-response')
                          <div class="alert alert-danger mt-5">{{ $message }}</div>
                      @enderror
                  </div>

              </div>
                <button type="submit" class="btn btn-primary">送信</button>
       </div>
    </div>
    
  </form>

  
</div>
<br>

@endsection