@extends('layouts.userLayout')
@section('content')
<hr>

    <main>
        <section class="popular-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h1>車両を売る</h1>
                    </div>
                    </div> 
                </div> 
                <div class="contact-content">
                    <div class="row">
                        <div class="col-md-8"> 
                            <div class="left-content">
                                
                                @if (session('status2'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status2') }}
                                    </div>
                                @endif

                                <form action="/contact" method="post">
                                        @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                          <fieldset>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="あなたのEメール..." >
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror  
                                        </fieldset>
                                        </div>
                                         <div class="col-md-6">
                                          <fieldset>
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"  placeholder="名前..." >
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror 
                                          </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                          <fieldset>
                                          <textarea name="message" rows="6" class="form-control @error('message') is-invalid @enderror" value="{{old('message')}}"  placeholder="あなたのメッセージ..." ></textarea>
                                            @error('message')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror   
                                        </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                            
                                                    @error('g-recaptcha-response')
                                                      <div class="alert alert-danger mt-5">{{ $message }}</div>
                                                  @enderror
                                          </fieldset>
                                          </div>
                                        <div class="col-md-12 mt-5">
                                          <fieldset>
                                            <div class="blue-button">
                                                <button id="form-submit" class="btn btn-primary">メッセージを送る</button>
                                            </div>
                                          </fieldset>
                                        </div>
                                    </div>


                                </form>


                        </div>
                        </div>
                        <div class="col-md-4 mt-5">
                            <div class="right-content" style="background-color: rgb(224, 220, 220)">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content" > 
                                            <ul style="color:black">
                                                <li ><span style="color:black">Free dial:</span> 0120663740</li>
                                                <li ><span style="color:black">Tel:</span>046-259-5441</li>
                                                <li ><span style="color:black">Fax:</span>046-205-4255</li>
                                                <li ><span style="color:black">Email:</span>nipponlineco@gmail.com</li>
                                                <li ><span style="color:black">Address:</span><img src="img/postal.png" style="width:20px;" alt=""> 243-0206 <i class="fa fa-map-marker"></i> 神奈川県厚木市下川入338-1</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </section>

    </main>

    @endsection