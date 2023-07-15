
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" type="img/png" href="/img/favicon.png">

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>



  <!-- data tables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="/plugins/ekko-lightbox/ekko-lightbox.css">

  <style>
    .container {
        max-width: 500px;
    }
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/img/favicon.png" alt="AdminLTELogo" height="80" width="80">
</div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-sm-inline-block">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="nav-link" href="route('logout')" data-placement="top" data-original-title="Logout"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
            <i class="fas fa-sign-out"></i><b>Logout</b> 
            </a>
        </form>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if(auth()->user()->unreadnotifications->count() != 0)
          <span class="badge badge-danger navbar-badge">{{auth()->user()->unreadnotifications->count()}}</span>
          @else
          
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{auth()->user()->unreadnotifications->count()}} Notifications</span>
          <div class="dropdown-divider"></div>
          @forelse(auth()->user()->unreadnotifications as $notification)
              <a href="#" class="dropdown-item">
                <i class="fas fa-car"></i> New buying vehicle listed
              <span class="float-right text-muted text-sm">{{$notification->updated_at->diffForHumans()}}</span>
              </a>
              @empty
                <center>No notification found</center>
          @endforelse
          <br>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('delete.notify') }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <a href="{{route('markasread')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
            <button class="dropdown-item dropdown-footer">Clear All Read Notifications</button>
          </form>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="/img/favicon.png"  style="width: 50px; border-radius:7px;" class="brand-image  elevation-0" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Nippon Line Co.Ltd</b> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user" style="font-size:30px; color:white;"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open mb-5">
            <a href="{{route('home')}}" class="nav-link {{ Request::path() === 'adminPanel'? 'active': '' }}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->role == "superAdmin")
              <li class="nav-item menu-open ">
                <a href="{{route('register')}}" class="nav-link {{ Request::path() === 'admin/register'? 'active': '' }}">
                    <small style="font-size:8px;"><i class="fas fa-plus" ></i> </small>
                    <i class="fas fa-users"></i> 
                  <p>
                    Manage Admins
                  </p>
                </a>
              </li>
          @endif
          <li class="nav-item menu-open ">
            <a href="{{route('manageMaker')}}" class="nav-link {{ Request::path() === 'admin/manage-makers'? 'active': '' }}">
                <i class="fas fa-plus" ></i>&nbsp;
              <p>
                Manage Makers
              </p>
            </a>
          </li>
          <li class="nav-item menu-open ">
            <a href="{{route('manageVehicle')}}" class="nav-link {{ Request::path() === 'admin/manage-vehicle'? 'active': '' }}">
                <small style="font-size:8px;"><i class="fas fa-plus" ></i> </small>
                <i class="fas fa-car"></i> 
              <p>
                Manage Vehicles
              </p>
            </a>
          </li>
          <li class="nav-item menu-open ">
            <a href="{{route('markasread')}}" class="nav-link {{ Request::path() === 'admin/buying-vehicles'? 'active': '' }}">
                <small style="font-size:8px;"><i class="fas fa-download"></i></small> 
                <i class="fa fa-car"></i> 
              <p>
                @php
                    $count =  App\Models\BuyingVehicle::where('read_at','=', null)->count()
                @endphp
                @if($count)
                  <span class="badge badge-danger navbar-badge">{{$count}}</span>Buying Vehicles Details
                @else
                  Buying Vehicles Details
                @endif
              </p>
            </a>
          </li>
          <li class="nav-item menu-open ">
            <a href="{{route('ad')}}" class="nav-link {{ Request::path() === 'admin/banner-ads'? 'active': '' }}">
                <i class="fas fa-ad"></i> 
              <p>
                Advertisement
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; 2022.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>

<!-- datatables js -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- Ekko Lightbox -->
<script src="/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


<script>

 // $(".select").hide();
  $(".checkAll").click(function(){
        $(".checkboxClass").prop('checked', $(this).prop('checked'));
          /*  if($(this).is(":checked")) {
              $(".select").show();
              $(".unselect").hide();
            }else{
              $(".unselect").show();
              $(".select").hide();

            }*/
            
  });
  
  /*$(".checkboxClass").click(function(){
            if($(this).is(":checked")) {
              $(".select").show();
              $(".unselect").hide();
            }else{
              $(".unselect").show();
              $(".select").hide();

            }
            
  });*/
</script>

<script type="text/javascript">
 
  $('.show_confirm_delete_ad').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       swal({
           title: `Are you sure you want to delete this record?`,
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
   });

</script>
<script type="text/javascript">
 
  $('.show_confirm_delete_selling_vehicle').click(function(event) {
    var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       var allids = [];

      $("input:checkbox[id=check]:checked").each(function(){
          allids.push($(this).val());
      });

      if (allids.length === 0) {
      
          swal({
            icon: 'warning',
            title: 'Warning',
            text: 'Please Select Some Records!',
          });
        
      }
      else
      {
       swal({
           title: `Are you sure you want to delete this record?`,
           text: "If you delete this, it will be gone forever.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
      }
   });

</script>

<script type="text/javascript">
 
  $('.show_confirm_delete_maker').click(function(event) {
    var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       var allids = [];

      $("input:checkbox[id=check]:checked").each(function(){
          allids.push($(this).val());
      });

      if (allids.length === 0) {
      
          swal({
            icon: 'warning',
            title: 'Warning',
            text: 'Please Select Some Records!',
          });
        
      }
      else
      {
       swal({
           title: `Are you sure you want to delete this record?`,
           text: "If you delete this, it will be gone forever.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
      }
   });

</script>

<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
<script type="text/javascript">
 
  $('.show_confirm_delete_vehicle').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       var allids = [];

      $("input:checkbox[id=check]:checked").each(function(){
          allids.push($(this).val());
      });

      if (allids.length === 0) {
      
          swal({
            icon: 'warning',
            title: 'Warning',
            text: 'Please Select Some Records!',
          });
        
      }
      else
      {
       swal({
           title: `Are you sure you want to delete this record?`,
           text: "If you delete this, it will be gone forever.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
      }
   });

</script>

<script>
  $(document).ready( function () {
        $('#MyAdminTable').DataTable({
          "order": [0, 'desc'],
        });
    } );
  $(document).ready( function () {
      $('#VehiclesTable').DataTable({
        "order": [0, 'desc'],
      });
  } );
  $(document).ready( function () {
      $('#AdTable').DataTable({
        "order": [0, 'desc'],
      });
  } );



</script>
<script>
  $('#example1').DataTable({
  "order": [0, 'desc'],
});

</script>
<script>
  $(document).ready( function () {
      $('#example2').DataTable({
        "order": [0, 'desc'],
      });
  } );
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote({

      height: 200,
      minHeight: 200,              
      maxHeight: 300,

    })
      
  });
</script>
<!-- manage vehicle -->

<script>
  $(function () {
    $('#quickFormForAd').validate({
      rules: {
       
        
      },
      messages: {
       
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>
<!-- manage vehicle -->

<script>
  $(function () {
    $('#quickFormForMaker').validate({
      rules: {
        maker_name: {
          required: true, 
        }
       
        
      },
      messages: {
        maker_name: {
          required: "Please enter a Maker Name ",
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>


<!-- manage makers -->

<script>
  $(function () {
    $('#quickForm').validate({
      rules: {
        vehicle_name: {
          required: true,
        },
        vehicle_price: {
          required: true,
        },
        vehicle_model_year: {
          required: true
        },
        vehicle_maker_id: {
          required: true
        },
        vehicle_displacement: {
          required: true
        },
        vehicle_Mileage: {
          required: true
        },
        vehicle_inspection: {
          required: true
        },
        vehicle_repire_history: {
          required: true
        },
        vehicle_transmission: {
          required: true
        },
        vehicle_body_color: {
          required: true
        },
        vehicle_riding_capacity: {
          required: true
        },
        vehicle_legal_inspection: {
          required: true
        },
        vehicle_guarantee: {
          required: true
        },
        vehicle_registered_un_used: {
          required: true
        },
        vehicle_recycling_deposite: {
          required: true
        },
        vehicle_import_route: {
          required: true
        },
        vehicle_body_type: {
          required: true
        },
        vehicle_steering: {
          required: true
        },
        vehicle_chassis_no: {
          required: true
        },
        vehicle_engine_type: {
          required: true
        },
        vehicle_no_of_doors: {
          required: true
        },
        vehicle_wheight: {
          required: true
        },
        vehicle_body_dimension: {
          required: true
        },
        vehicle_type: {
          required: true
        },
        description: {
          required: true
        },
        use: {
          required: true
        }
        
      },
      messages: {
        vehicle_name: {
          required: "Please enter a Vehicle Name ",
        },
        vehicle_transmission: {
          required: "Please enter a Vehicle Name ",
        },
        vehicle_price: {
          required: "Please enter a Vehicle Price ",
        },
        vehicle_model_year: {
          required: "Please enter a Vehicle Model & Year ",
        },
        vehicle_maker_id: {
          required: "Please Select a Vehicle Maker ",
        },
        vehicle_displacement: {
          required: "Please enter a Vehicle Displasement ",
        },
        vehicle_Mileage: {
          required: "Please enter a Vehicle Mileage ",
        },
        vehicle_inspection: {
          required: "Please enter a Vehicle Inspection ",
        },
        vehicle_repire_history: {
          required: "Please enter a Vehicle Rapire History ",
        },
        vehicle_body_color: {
          required: "Please enter a Vehicle Body Color ",
        },
        vehicle_riding_capacity: {
          required: "Please enter a Vehicle Riding Capacity ",
        },
        vehicle_legal_inspection: {
          required: "Please enter a Vehicle Legal Inspection ",
        },
        vehicle_guarantee: {
          required: "Please enter a Vehicle Guarantee ",
        },
        vehicle_registered_un_used: {
          required: "Please enter a Vehicle Registered un used ",
        },
        vehicle_recycling_deposite: {
          required: "Please enter a Vehicle Recycling deposite ",
        },
        vehicle_import_route: {
          required: "Please Select a Vehicle Import route ",
        },
        vehicle_body_type: {
          required: "Please enter a Vehicle Body Type ",
        },
        vehicle_steering: {
          required: "Please enter a Vehicle Steering",
        },
        vehicle_chassis_no: {
          required: "Please enter a Vehicle Chassis Number",
        },
        vehicle_engine_type: {
          required: "Please enter a Vehicle Engine type ",
        },
        vehicle_no_of_doors: {
          required: "Please enter a No of doors",
        },
        vehicle_wheight: {
          required: "Please enter a Vehicle Wheight ",
        },
        vehicle_body_dimension: {
          required: "Please enter a Vehicle Body Dimension ",
        },
        vehicle_type: {
          required: "Please enter a Vehicle Type ",
        },
        description: {
          required: "Please enter a Vehicle Description ",
        },
        use: {
          required: "Please enter a Vehicle use ",
        },
       
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>



<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    img.src = URL.createObjectURL(file)
  }
}
</script>
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
                  $('#mydev').hide();
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

