@extends('layouts.userLayout')
@section('content')
<hr>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>About us</h4>
                            <p>2019年に会社を設立しました。中古車、バン、トラック、あらゆる種類の建設機械を扱っています。 お客様のご要望にお応えできるよう最善を尽くします!! どんな車種でもお探しの方はお気軽にお電話ください！ どうぞよろしくお願いいたします</p>
                            <p>オーナー： Mohamed Hassan</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="img/logo.JPG" style="width:300px;" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-12">
                          <div class="blue-button">
                          <a href="{{route('contact')}}"  class="btn">Contact Us</a>
                          </div>
                      </div>
                </div>
            </div>
        </section>

    </main>

@endsection