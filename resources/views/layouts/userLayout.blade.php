
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="img/png" href="/img/favicon.png">
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/fontAwesome.css">
        <link rel="stylesheet" href="/css/hero-slider.css">
        <link rel="stylesheet" href="/css/owl-carousel.css">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
          <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="/plugins/ekko-lightbox/ekko-lightbox.css">
        <style>
            dl, ol, ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .imgPreview img {
                padding: 8px;
                max-width: 100px;
            } 
        </style>
    </head>
<style>

.table-fixed tbody td,
.table-fixed thead>tr>th {
    float: left;
    padding-left:23px !important;
}

.table-fixed tbody {
    display: block;
    height: 300px;
    overflow-y: auto;
    
}
.table-fixed tbody::-webkit-scrollbar {
  display: none;
}
.table-fixed tr {
    display: block;
}
</style>


<style>
    .dropzoneDragArea {
        background-color: #fbfdff;
        border: 1px dashed #c0ccda;
        border-radius: 6px;
        padding: 60px;
        text-align: center;
        margin-bottom: 15px;
        cursor: pointer;
    }
    .dropzone{
        box-shadow: 0px 2px 20px 0px #f2f2f2;
        border-radius: 10px;
    }
</style>

<style>
    .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;

}

.uploadbtn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  
}
</style>

<body>
    <div class="wrap">
        <header id="header" style="background-color: rgba(231, 231, 231, 0.747);">
            <div class="container p-3">
                    <span class="float-left"><h6 style="color: dodgerblue; display:inline;" ><i class="fa fa-phone"></i> Free Dial: 0120-66-3740</h6></span>
                    <span class="float-right comName2"><h6 style="color: dodgerblue; display:inline" class="name"> ニッポンライン株式会社</h6></span>
            </div>
        </header>
    </div>
    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button  id="primary-nav-button" type="button">Menu</button>
                        <a href="/"><div class="logo">
                            <img src="/img/logo.JPG" class="logoImg" style="width:160px;" alt="Venue Logo"><span class="comName">ニッポンライン株式会社</span> 
                            <p class="text-nowrap coNo" style="color:#000;">古物番号
                                452740019115 号 </p>
                        </div></a>
                        
                        
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li class="{{ Request::path() === '/'? 'active': '' }}"><a href="/"><b>トップページ</b></a></li>
                            <li class="{{ Request::path() === 'all-vehicles'? 'active': '' }}"><a href="{{route('vehicles')}}"><i class="fa fa-car"></i> <b>車両</b></a></li>
                                <li class="{{ Request::path() === 'sell-vehicle'? 'active': '' }}"><a href="{{route('sellVehicle')}}"><i class="fa fa-paper-plane" aria-hidden="true"><i class="fa fa-car"></i></i> <b>車両を売る</b></a></li>
                            <li class="{{ Request::path() === 'about-us'? 'active': '' }}"><a href="{{'/about-us'}}"><b>About Us</b></a></li>

                            <li class="{{ Request::path() === 'contact-us'? 'active': '' }}"><a class="nav-link" href="{{route('contact')}}"><b>お問い合わせ</b></a></li>
                            </ul>
                        </nav><!---nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>


    @yield('content')



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="/img/logo.JPG" style="width:110px;" alt="Venue Logo">
                        </div>
                        <p>2019年に会社を設立しました。中古車、バン、トラック、あらゆる種類の建設機械を扱っています。
                            お客様のご要望にお応えできるよう最善を尽くします!!
                            どんな車種でもお探しの方はお気軽にお電話ください！
                            どうぞよろしくお願いいたします</p>
                        <ul class="social-icons">
                            <li>Line QR:
                                <img src="/img/lineQR.png" style="width: 100px" alt="lineQR">
                                &nbsp;&nbsp;&nbsp;
                                <a href="https://www.facebook.com/nipponlineco/" target="blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li ><a href="/"><i class="fa fa-stop"></i>Home</a></li>
                                    <li ><a href="{{route('vehicles')}}"><i class="fa fa-stop"></i>vehicles</a></li>
                                    <li ><a href="{{route('sellVehicle')}}"><i class="fa fa-stop"></i>Sell vehicles</a></li>
                                    <li ><a href="{{'about-us'}}"><i class="fa fa-stop"></i>About</a></li>
                                    <li ><a href="{{route('contact')}}"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p><i class="fa fa-building"></i> NIPPON LINE CO.,LTD
                            </p>
                        <p>
                            <img src="/img/postal.png" style="width:20px;" alt=""> 243-0206 <i class="fa fa-map-marker"></i> 神奈川県厚木市下川入338-1</p>
                        <ul>
                            <li><span>Free dial:</span><a href="#"> 0120663740</a></li>
                            <li><span>Tel:</span><a href="#">046-259-5441</a></li>
                            <li><span>Fax:</span><a href="#">046-205-4255</a></li>
                            <li><span>Email:</span><a href="#">nipponlineco@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright © 2020 Nippon line co.ltd - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a> - Developed by: <a href="https://www.linkedin.com/in/mohamed-zabith-808708224" target="blank">A.S.M Zabith</a></p>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="/js/datepicker.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>
<!-- Ekko Lightbox -->
<script src="/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#images').on('change', function() {
        multiImgPreview(this, 'div.imgPreview');
    });
    });    
</script>

</body>
</html>